<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter-Filter
 *
 * This controller allows for methods to be called immediately before or after
 * an action is executed.
 *
 * @package     CodeIgniter-Filter
 * @version     0.0.2
 * @author      Matthew Machuga
 * @license     MIT License
 * @copyright   2011 Matthew Machuga
 * @link        http://github.com/machuga/codeigniter-filter/
 *
 */

class MY_Controller extends CI_Controller {

	public $show_banner = false;
	public $categories = array();
	public $makes = array();
	public $years = array();

	function __construct()
	{
		parent::__construct();

		$this->user = $this->session->userdata('user_id') ? User::find($this->session->userdata('user_id')) : FALSE;
		$this->categories = $this->convert_to_name_id_array(category::find('all', array(
			'order' => 'name ASC'
		)));
        $this->specials = vehicle::find('all', array('conditions' => 'vehicles.featured_special = 1',
            'order' => 'vehicles.created_at DESC',
            'limit' => 10,
            'offset' => 0,
        ));
		$this->makes = $this->get_makes();
		$y = range(date('Y'), 1950);
		$this->years = array_combine($y, $y);
	}

	protected $before_filter   = array(
		// Example
		// 'action'    => 'redirect_if_not_logged_in',
	);

	protected $after_filter    = array();

	// Utilize _remap to call the filters at respective times
	public function _remap($method, $params = array())
	{
		$this->before_filter();
		if (method_exists($this, $method))
		{
			empty($params) ? $this->{$method}() : call_user_func_array(array($this, $method), $params);
		}
		$this->after_filter();
	}

	// Allows for before_filter and after_filter to be called without aliases
	public function __call($method, $args)
	{
		if (in_array($method, array('before_filter', 'after_filter')))
		{
			if (isset($this->{$method}) && ! empty($this->{$method}))
			{
				$this->filter($method, isset($args[0]) ? $args[0] : $args);
			}
		}
		else
		{
			log_message('error', "Call to nonexistent method ".get_called_class()."::{$method}");
			return false;
		}
	}

	// Begins processing filters
	protected function filter($filter_type, $params)
	{
		$called_action = $this->router->fetch_method();

		if ($this->multiple_filter_actions($filter_type))
		{
			foreach ($this->{$filter_type} as $filter)
			{
				$this->run_filter($filter, $called_action, $params);
			}
		}
		else
		{
			$this->run_filter($this->{$filter_type}, $called_action, $params);
		}
	}

	// Determines if the filter method can be called and calls the requested 
	// action if so, otherwise returns false
	protected function run_filter(array &$filter, $called_action, $params)
	{
		if (method_exists($this, $filter['action']))
		{
			// Set flags
			$only = isset($filter['only']);
			$except = isset($filter['except']);

			if ($only && $except) 
			{
				log_message('error', "Only and Except are not allowed to be set simultaneously for action ({$filter['action']} on ".$this->router->fetch_method().".)");
				return false;
			}
			elseif ($only && in_array($called_action, $filter['only'])) 
			{
				empty($params) ? $this->{$filter['action']}() : $this->{$filter['action']}($params);
			}
			elseif ($except && ! in_array($called_action, $filter['except'])) 
			{
				empty($params) ? $this->{$filter['action']}() : $this->{$filter['action']}($params);
			}
			elseif ( ! $only && ! $except) 
			{
				empty($params) ? $this->{$filter['action']}() : $this->{$filter['action']}($params);
			}

			return true;
		}
		else
		{
			log_message('error', "Invalid action {$filter['action']} given to filter system in controller ".get_called_class());
			return false;
		}
	}

	protected function multiple_filter_actions($filter_type) 
	{
		return ! empty($this->{$filter_type}) && array_keys($this->{$filter_type}) === range(0, count($this->{$filter_type}) - 1);
	}

	/*
	 *
	 * Example callbacks for filters
	 * Callbacks can optionally have one parameter consisting of the
	 * parameters passed to the called action.
	 *
	 */

	protected function is_logged_in()
	{
		if (!$this->user)
		{
			//set message 
			$this->session->set_flashdata('message', array( 'type' => 'warning', 'text' => lang('web_not_logged') ) );

			//redirect them to the login page
			redirect('/admin/login/', 'refresh');
		}
		else
		{
			$result = $this->sangar_auth->check();

			if (!$result)
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => lang('session_not_correct') ));
				redirect('/admin/login/');
			}
		}
	}

	public function get_makes(){
		$this->db->select('make');
		$this->db->group_by("make");
		$query = $this->db->get('vehicles');
		$data = array();
		foreach($query->result() as $row){
            $make = trim($row->make);
            $data[$make] = $make;
        }
		return $data;
	}

	public function convert_to_name_id_array($objs){
		$data = array();
		foreach($objs as $obj)
			$data[$obj->id] = $obj->name;
		return $data;
	}
}
