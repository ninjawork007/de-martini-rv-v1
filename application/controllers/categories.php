<?php

class Categories extends MY_Controller
{
	public $show_banner = false;

	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('frontend');
	}


	public function index()
	{
		$this->template->set('title', 'All Categories');

		$config = $this->set_paginate_options();
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$this->template->set('links', $this->pagination->create_links());

		$vehicles = $this->get_vehicles(false, false, $config['per_page'], $page);

		$config['total_rows'] = $vehicles['count'];
		$config['base_url'] = site_url() . '/categories/';

		$this->pagination->initialize($config);
		//echo Vehicle::connection()->last_query;
		//die();
		$this->template->set('links', $this->pagination->create_links());
		$this->template->set('vehicles', $vehicles['rows']);
		$this->template->build('categories/listview.php');
	}

    private function get_all($condition = false){
        $seg = 5;
        $cat = ($this->uri->segment(3)) ? explode('-', $this->uri->segment(3)) : 1;
        $page = ($this->uri->segment($seg)) ? $this->uri->segment($seg) : 1;

        $Category = Category::find($cat);
        $this->template->set('title', $Category->name);

        $config = $this->set_paginate_options($seg);

        $vehicles = $this->get_vehicles($cat, $condition, $config['per_page'], $page);
        $config['total_rows'] = $vehicles['count'];

        $config['base_url'] = site_url() . '/categories/' . $this->uri->segment(2) . '/' . implode('-', $cat) . '/' . $this->uri->segment(4) . '/';

        $this->pagination->initialize($config);
        //echo Vehicle::connection()->last_query;
        //die();
        $this->template->set('links', $this->pagination->create_links());
        $this->template->set('vehicles', $vehicles['rows']);
        $this->template->build('categories/listview.php');
    }

	public function all(){
        $this->get_all();
	}

    public function used_rvs(){
        $this->get_all('used');
    }

    public function new_rvs(){
        $this->get_all('new');
    }

	public function type()
	{
		$condition = ($this->uri->segment(3)) ? explode('-', $this->uri->segment(3)) : 1;
		$this->template->set('title', ucwords(implode(' & ', $condition)) . ' RVs');

		$seg = 4;
		$page = ($this->uri->segment($seg)) ? $this->uri->segment($seg) : 1;

		$config = $this->set_paginate_options($seg);

		$vehicles = $this->get_vehicles(false, $condition, $config['per_page'], $page);
		$config['total_rows'] = $vehicles['count'];
		$config['base_url'] = site_url() . '/categories/type/' . $this->uri->segment(3);

		$this->pagination->initialize($config);
		//echo Vehicle::connection()->last_query;
		//die();
		$this->template->set('links', $this->pagination->create_links());
		$this->template->set('vehicles', $vehicles['rows']);
		$this->template->build('categories/listview.php');
	}

	public function model_new(){
    	$this->model();
	}

	public function model()
	{
		$model_str = ($this->uri->segment(3)) ? str_replace('_', '-', str_replace('-', ' ', $this->uri->segment(3))) : 1;
		$this->template->set('title', ucwords($model_str));

        $model_str = trim($model_str);

        $last_word = end(explode(' ', $model_str));

        if($last_word === 'all'){
            $model_str = str_replace(' all', '%', $model_str);
        }

		$seg = 4;
		$page = ($this->uri->segment($seg)) ? $this->uri->segment($seg) : 1;

		$config = $this->set_paginate_options($seg);

		$params = array();
        $params['model_term']['all'] = $model_str;

		$vehicles = $this->get_vehicles(false, false, $config['per_page'], $page, $params);
		$config['total_rows'] = $vehicles['count'];
		$base_path = $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/';
		$config['base_url'] = base_url() . $base_path;

		$this->pagination->initialize($config);
		//echo Vehicle::connection()->last_query;
		//die();
		$this->template->set('links', $this->pagination->create_links());
		$this->template->set('vehicles', $vehicles['rows']);
		$this->template->build('categories/listview.php');
	}

	public function web_specials()
	{
		$this->template->set('title', 'Web Specials');

		$seg = 3;
		$page = ($this->uri->segment($seg)) ? $this->uri->segment($seg) : 1;

		$config = $this->set_paginate_options($seg);

		$vehicles = $this->get_vehicles(false, false, $config['per_page'], $page, array('vehicles' => array('web_special' => '1')));
		$config['total_rows'] = $vehicles['count'];
		$config['base_url'] = site_url() . '/categories/type/new/';

		$this->pagination->initialize($config);
		//echo Vehicle::connection()->last_query;
		//die();
		$this->template->set('links', $this->pagination->create_links());
		$this->template->set('vehicles', $vehicles['rows']);
		$this->template->build('categories/listview.php');
	}

	public function clearance()
	{
		$this->template->set('title', 'Clearance RVs');

		$seg = 3;
		$page = ($this->uri->segment($seg)) ? $this->uri->segment($seg) : 1;

		$config = $this->set_paginate_options($seg);

		$vehicles = $this->get_vehicles(false, false, $config['per_page'], $page, array('vehicles' => array('clearance' => '1')));
		$config['total_rows'] = $vehicles['count'];
		$config['base_url'] = site_url() . '/categories/type/new/';

		$this->pagination->initialize($config);
		//echo Vehicle::connection()->last_query;
		//die();
		$this->template->set('links', $this->pagination->create_links());
		$this->template->set('vehicles', $vehicles['rows']);
		$this->template->build('categories/listview.php');
	}


	private function get_vehicles($cat = false, $condition = false, $limit, $page, $params = array()){

		if($cat !== false){
			$params = array(
				'vehicles' => array(
					'category_id' => $cat
				)
			);
		}

		if($condition !== false)
			$params['vehicles']['vehicle_condition'] = $condition;
		return array(
			'rows' => Vehicle::search_all($params, $limit, $page, $this->input->get_post('sort_by') ? $this->input->get_post('sort_by') : 'item_number DESC'),
			'count' => Vehicle::count_all($params)
		);
	}

	private function set_paginate_options($seg = '3')
	{
		$config = array();

		$config['base_url'] = site_url() . '/categories/index';

		$config['use_page_numbers'] = TRUE;

		$config['per_page'] = 25;

		$config['total_rows'] = 0;

		$config['uri_segment'] = $seg;

		$config['first_link']      = "&#171; " . lang('web_first');
		$config['first_tag_open']  = "<li class='pure-button'>";
		$config['first_tag_close'] = '</li>';

		$config['last_link']      = lang('web_last') . " &#187;";
		$config['last_tag_open']  = "<li class='pure-button'>";
		$config['last_tag_close'] = '</li>';

		$config['next_link']      = '&#187;';
		$config['next_tag_open']  = "<li class='pure-button next'>";
		$config['next_tag_close'] = '</li>';

		$config['prev_link']      = '&#171;';
		$config['prev_tag_open']  = "<li class='pure-button prev'>";
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open']  = "<li class='pure-button pure-button-active'>";
		$config['cur_tag_close'] = '</li>';

		$config['num_tag_open']  = "<li class='pure-button'>";
		$config['num_tag_close'] = '</li>';

		$config['full_tag_open']  = "<ul class='pure-paginator'>";
		$config['full_tag_close'] = '</ul>';

		$choice = $config["total_rows"] / $config["per_page"];
		//$config["num_links"] = round($choice);

		return $config;
	}

}
