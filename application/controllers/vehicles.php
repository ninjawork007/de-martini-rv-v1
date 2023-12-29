<?php

class Vehicles extends MY_Controller
{
	public $show_banner = false;

	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('frontend');
	}


	public function index()
	{
		$this->template->set('title', 'Vehicles');

		$config = $this->set_paginate_options();
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$this->template->set('links', $this->pagination->create_links());

		$vehicles = $this->get_vehicles(false, false, $config['per_page'], $page);

		$this->template->set('vehicles', $vehicles);
		$this->template->build('categories/listview.php');
	}

	public function search(){
	    $page = ($this->input->get_post('per_page')) ? $this->input->get_post('per_page') : 1;
    	$this->template->set('title', 'Search Results');
    	$params = array();
    	if($this->input->get_post('advanced-search')){
        	if($condition = $this->get_param('condition')){
        	    if($condition == 'both')
                	$params['vehicles']['vehicle_condition'] = array('used', 'new');
                else
                    $params['vehicles']['vehicle_condition'] = $condition;
        	}
        	if($cat = $this->get_param('category')){
            	$params['vehicles']['category_id'] = $cat;
        	}
        	if($year = $this->get_param('year')){
            	$params['vehicles']['year'] = $year;
        	}
        	$to_year = $this->get_param('to_year');
        	$from_year = $this->get_param('from_year');
        	if($to_year && $from_year){
        	    if($from_year < $to_year){
            	    $params['vehicles']['year::>='] = $from_year;
            	    $params['vehicles']['year::<='] = $to_year;
        	    }else{
            	    $params['vehicles']['year::<='] = $from_year;
            	    $params['vehicles']['year::>='] = $to_year;
        	    }
        	}
        	if($make = $this->get_param('make')){
            	$params['vehicles']['make'] = $make;
        	}
        	if($model = $this->get_param('model')){
            	$params['vehicles']['model'] = $model;
        	}

        	if($this->get_param('length') !== '>0' && $length = $this->get_param('length', 'range')){
            	if(isset($length[0])) $params['vehicles']['length::<='] = $length[0];
            	if(isset($length[1])) $params['vehicles']['length::>='] = $length[1];
        	}

        	if($this->get_param('price') !== '>0' && $price = $this->get_param('price', 'range')){
            	if(isset($price[0])) $params['vehicles']['price::<'] = $price[0];
            	if(isset($price[1])) $params['vehicles']['price::>'] = $price[1];
        	}
    	}else{
        	if($term = $this->get_param('query')){
            	$params['term']['all'] = $term;
        	}
    	}
    	$config = $this->set_paginate_options();
    	$vehicles = array(
			'rows' => Vehicle::search_all($params, $config['per_page'], $page, $this->input->get_post('sort_by') ? $this->input->get_post('sort_by') : 'item_number DESC'),
			'count' => Vehicle::count_all($params)
		);
		$config['total_rows'] = $vehicles['count'];
		$config['base_url'] = full_url();
		$config['page_query_string'] = true;
        $this->pagination->initialize($config);
        $this->template->set('links', $this->pagination->create_links());

		$this->template->set('vehicles', $vehicles['rows']);
		$this->template->build('categories/listview.php');
	}

	private function get_param($key, $type = 'string'){
	    $val = $this->input->get_post($key) ? $this->input->get_post($key) : false;
	    if($type == 'range'){
    	    return Vehicle::parse_range($val);
	    }
        return $val;
	}

	public function simplelist(){
    	$this->template->set('title', 'All Vehicles');
		$vehicles = $this->get_vehicles(false, false, 20000, 1);
		$config['total_rows'] = $vehicles['count'];
		$this->template->set('vehicles', $vehicles['rows']);
		$this->template->build('vehicles/simplelist.php');
	}

	public function sitemap(){
    	header("Content-Type: text/xml;charset=iso-8859-1");
		$vehicles = $this->get_vehicles(false, false, 40000, 1);
		$urls = array();
		$urls[] = '/categories';
		$urls[] = '/categories/model_new/forest-river-berkshire';
		$urls[] = '/categories/model_new/thor-tuscany';
		$urls[] = '/categories/model_new/monaco-diplomat';
		$urls[] = '/categories/model_new/monaco-knight';
		$urls[] = '/categories/model_new/thor-palazzo';
		$urls[] = '/categories/model_new/thor-serrano';
		$urls[] = '/categories/model_new/forest-river-solera';
		$urls[] = '/categories/model_new/forest-river-georgetown';
		$urls[] = '/categories/model_new/forest-river-fr3';
		$urls[] = '/categories/model_new/thor-outlaw';
		$urls[] = '/categories/model_new/thor-windsport';
		$urls[] = '/categories/model_new/thor-vegas';
		$urls[] = '/categories/model_new/monaco-monarch';
		$urls[] = '/categories/model_new/coachmen-concord';
		$urls[] = '/categories/model_new/forest-river-forester';
		$urls[] = '/categories/model_new/forest-river-solera';
		$urls[] = '/categories/model_new/forest-river-prism';
		$urls[] = '/categories/model_new/forest-river-surveyor';
		$urls[] = '/categories/model_new/thor-outlaw';
		$urls[] = '/categories/model_new/thor-razorback';
		$urls[] = '/categories/model_new/Forest-River-r_pod';
		$urls[] = '/categories/model_new/palm-harbor';
		$urls[] = '/categories/model_new/skyline';
		$urls[] = '/testimonials';
		$urls[] = '/categories/clearance';
		$urls[] = '/categories/web_specials';
		$urls[] = '/categories/type/new';
		$urls[] = '/categories/type/used';

		foreach($this->categories as $id => $cat){
		    $urls[] = 'categories/all/' . $id . '/' . generate_seo_link($cat);
		}
        $this->load->view("vehicles/sitemap", array('urls' => $urls, 'vehicles' => $vehicles['rows']));
	}

	public function detail(){

    	$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('/');

    	$vehicle = Vehicle::find_by_id($id);
    	$this->template->set('title', $vehicle->tagline);
    	$this->template->set('vehicle', $vehicle);
    	$this->template->set('tabs', $this->generate_tabs($vehicle));
    	$this->template->build('vehicles/detail/all');
	}

	public function by_stock(){
			$stock = false;
			if($this->uri->segment(3)){
				$stock = $this->uri->segment(3);
			}else if($this->uri->segment(2)){
				$stock = $this->uri->segment(2);
			}else if($this->uri->segment(1)){
				$stock = $this->uri->segment(1);
			}

			if(empty($stock)){
				redirect('/');
			}

    	$vehicle = Vehicle::find_by_stock($stock);
    	if(!empty($vehicle)){
    		$this->template->set('title', $vehicle->tagline);
	    	$this->template->set('vehicle', $vehicle);
	    	$this->template->set('tabs', $this->generate_tabs($vehicle));
	    	$this->template->build('vehicles/detail/all');
    	}else{
    		die("No RV by that stock number.");
    	}

	}

    private function generate_tabs($vehicle){
        $tabs = array();
        $this->set_tab($tabs, $vehicle, 'description_info', 'Description', true);
        $this->set_tab($tabs, $vehicle, 'video_embed', 'Videos');
        $this->set_tab($tabs, $vehicle, 'equipment', 'Features', true);
        $floor_plan = false;
        if($vehicle->uploads){
            foreach($vehicle->uploads as $upload){
                if($upload->name == 'brochure'){
                    $this->set_tab($tabs, $vehicle, 'brochures', 'Brochures', true);
                }else if($upload->name == 'msrp'){
                    $this->set_tab($tabs, $vehicle, 'msrp_sheet', 'MSRP Sheet', true);
                }else if($upload->name == 'floor_plan'){
                    $floor_plan = true;
                    $this->set_tab($tabs, $vehicle, 'floor_plan', 'Floor Plan', true);
                }
            }
        }
        if(!$floor_plan && !empty($vehicle->floor_plan)){
            $this->set_tab($tabs, $vehicle, 'floor_plan', 'Floor Plan', true);
        }
        $this->set_tab($tabs, $vehicle, 'financing', 'Financing', true);
        $this->set_tab($tabs, $vehicle, 'insurance', 'Insurance & Warranty', true);

       return $tabs;
    }

    private function set_tab(&$tabs, $item, $key, $lbl, $is_view = false){
        $this->template->set_layout(NULL);
        if(!$is_view && !empty($item->{$key})){
            $tabs[$key] = array('lbl' => $lbl, 'val' => $item->{$key}, 'key' => $key);
        }else if($is_view){
            $tabs[$key] = array('lbl' => $lbl, 'val' => $this->template->build('vehicles/tabs/'. $key, array('vehicle' => $item), true), 'key' => $key);
        }else{
            //TEST
            //$tabs[$key] = array('lbl' => $lbl, 'val' => 'No Data');
        }
        $this->template->set_layout('frontend');
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

		$config['base_url'] = site_url() . '/vehicles/index';

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
