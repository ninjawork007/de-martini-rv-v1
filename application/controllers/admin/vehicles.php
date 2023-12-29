<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles extends MY_Controller
{
	protected $before_filter = array('action' => 'is_logged_in'
		//'except' => array(),

		//'only' => array()
	);

	function __construct()
	{
		parent::__construct();

		$this->template->set_layout('backend');
	}

	public function index(){
		$this->template->title(lang('web_list_of', array(
			':name' => 'vehicles'
		)));
		$page = ($this->uri->segment(3) ? $this->uri->segment(3) : 1);

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
                if(isset($price[0])) $params['vehicles']['sale_price::<'] = $price[0];
                if(isset($price[1])) $params['vehicles']['sale_price::>'] = $price[1];
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
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $this->template->set('links', $this->pagination->create_links());

		$found_statuses = Status::find('all', array('order' => 'name ASC'));
		$statuses = array();
		foreach($found_statuses as $status){
			$statuses[$status->id] = $status->name;
		}
		$this->template->set('statuses', $statuses);

		//control variables
		$this->template->set('page', $page);

        $this->template->set('vehicles', $vehicles['rows']);

        //Load view
		$this->template->build('vehicles/list');
	}

	private function get_param($key, $type = 'string'){
		$val = $this->input->get_post($key) ? $this->input->get_post($key) : false;
		if($type == 'range'){
			return Vehicle::parse_range($val);
		}
		return $val;
	}

	function create($page = NULL)
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());

        $this->template->append_metadata("<script src='js/ckeditor/ckeditor.js' type='text/javascript'></script>");
		//create control variables
		$form_data_aux = array();
		$this->template->title(lang('web_create_t', array(
			':name' => 'vehicles'
		)));
		$this->template->set('updType', 'create');
		//Select 1:N data
		$this->template->set('array_category', category::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_status', status::find('all', array(
			'order' => 'name ASC'
		)));

		//Select 1:N data
		$this->template->set('array_slide', slide::find('all', array(
			'order' => 'name ASC'
		)));


		//Select 1:N data
		$this->template->set('array_vehicle_template', vehicle_template::find('all', array(
			'order' => 'name ASC'
		)));


		//Select 1:N data
		$this->template->set('array_engine', engine::find('all', array(
			'order' => 'name ASC'
		)));


		//Select 1:N data
		$this->template->set('array_cockpit_option', cockpit_option::find('all', array(
			'order' => 'name ASC'
		)));


		//Select 1:N data
		$this->template->set('array_bedroom_layout', bedroom_layout::find('all', array(
			'order' => 'name ASC'
		)));
		$this->template->set('array_bath_layout', bath_layout::find('all', array(
			'order' => 'name ASC'
		)));


		//Select 1:N data
		$this->template->set('array_furniture', furniture::find('all', array(
			'order' => 'name ASC'
		)));


		//Select 1:N data
		$this->template->set('array_flooring', flooring::find('all', array(
			'order' => 'name ASC'
		)));


		//Select 1:N data
		$this->template->set('array_interior_equipment', interior_equipment::find('all', array(
			'order' => 'name ASC'
		)));

		//Select 1:N data
		$this->template->set('array_exterior_equipment', exterior_equipment::find('all', array(
			'order' => 'name ASC'
		)));

		//Select 1:N data
		$this->template->set('array_exterior_equipment', exterior_equipment::find('all', array(
			'order' => 'name ASC'
		)));

		$this->template->set('page', ($this->uri->segment(4)) ? $this->uri->segment(4) : $this->input->post('page', TRUE));

		//Rules for validation
		$this->set_rules();

		//validate the fields of form
		if ($this->form_validation->run() == FALSE) {
			//Load view
			$this->template->build('vehicles/create');
		} else {
			//Validation OK!
			$form_data = array(
				'category_id' => set_value('category_id'),
				'vehicle_condition' => set_value('vehicle_condition'),
				'status_id' => set_value('status_id'),
				'template_id' => set_value('template_id'),
				'asking_price' => set_value('asking_price'),
				'sale_price' => set_value('sale_price'),
				'web_special' => set_value('web_special'),
				'clearance' => set_value('clearance'),
				'year' => set_value('year'),
				'make' => set_value('make'),
				'model' => set_value('model'),
				'length' => set_value('length'),
				'series' => set_value('series'),
				'item_number' => set_value('item_number'),
				'vin' => set_value('vin'),
				'mileage' => set_value('mileage'),
				'description' => set_value('description'),
				'short_description' => set_value('short_description'),
				'engine_id' => set_value('engine_id'),
				'fuel_type' => set_value('fuel_type'),
				'generator_make' => set_value('generator_make'),
				'generator_kw' => set_value('generator_kw'),
				'generator_hours' => set_value('generator_hours'),
				'generator_type' => set_value('generator_type'),
				'hide_generator_hours' => set_value('hide_generator_hours'),
				'chassis' => set_value('chassis'),
				'map_price' => set_value('map_price'),
				'model_number' => set_value('model_number'),
				'transmission' => set_value('transmission'),
				'title' => set_value('title'),
				'video_embed' => set_value('video_embed'),
				'tagline' => set_value('tagline'),
				'warranty_title' => set_value('warranty_title'),
				'warranty_description' => set_value('warranty_description'),
				'drivetrain' => set_value('drivetrain'),
				'style' => set_value('style'),
				'cockpit_option_id' => set_value('cockpit_option_id'),
				'bedroom_layout_id' => set_value('bedroom_layout_id'),
				'furniture_id' => set_value('furniture_id'),
				'flooring_id' => set_value('flooring_id'),
				'slide_id' => set_value('slide_id'),
				'interior_color' => set_value('interior_color'),
				'exterior_color' => set_value('exterior_color'),
				'featured_special' => set_value('featured_special')
			);



			$vehicle = Vehicle::create($form_data);

			$this->add_options($vehicle);

			if ($vehicle->is_valid()) // the information has therefore been successfully saved in the db
			{

			    $this->generate_description($vehicle->id);

				$this->session->set_flashdata('message', array(
					'type' => 'success',
					'text' => lang('web_create_success')
				));
			}

			if ($vehicle->is_invalid()) {
				$this->session->set_flashdata('message', array(
					'type' => 'error',
					'text' => $vehicle->errors->full_messages()
				));
			}

			redirect('/admin/vehicles/');
		}
	}

	private function add_options($vehicle)
	{
		Vehicleexteriorequipment::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('exterior_equipments') as $id) {
			Vehicleexteriorequipment::create(array(
				'exterior_equipment_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}
		Vehicleinteriorequipment::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('interior_equipments') as $id) {
			Vehicleinteriorequipment::create(array(
				'interior_equipment_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}
		Vehicleflooring::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('flooring') as $id) {
			Vehicleflooring::create(array(
				'flooring_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}
		Vehiclefurniture::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('furniture') as $id) {
			Vehiclefurniture::create(array(
				'furniture_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}
		Vehicleengine::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('engine') as $id) {
			Vehicleengine::create(array(
				'engine_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}

		Vehiclebathlayouts::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('bath_layouts') as $id) {
			Vehiclebathlayouts::create(array(
				'bath_layout_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}

		Vehiclebedroomlayouts::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('bedroom_layouts') as $id) {
			Vehiclebedroomlayouts::create(array(
				'bedroom_layout_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}

		Vehiclecockpitoptions::table()->delete(array(
			'vehicle_id' => $vehicle->id
		));
		foreach ((array)$this->input->post('cockpit_options') as $id) {
			Vehiclecockpitoptions::create(array(
				'cockpit_option_id' => $id,
				'vehicle_id' => $vehicle->id
			));
		}
	}

	function quick_edit(){
		$id = ($this->uri->segment(4)) ? $this->uri->segment(4) : $this->input->post('id', TRUE);
		$id = ($id != 0) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

		$success = false;

		if($veh = Vehicle::find_by_id($id)){
			$form_data = array();
			$form_data['status_id'] = $this->input->post('status_id');
			$veh->update_attributes($form_data);
			$success = $veh->is_valid();
		}
		echo json_encode(array('success'=> $success, 'status_id' => $this->input->post('status_id'), 'id' => $id));
		die();
	}

	function edit($id = FALSE, $page = 1)
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());

        $this->template->append_metadata("<script src='js/ckeditor/ckeditor.js' type='text/javascript'></script>");

		//get the $id and sanitize
		$id = ($this->uri->segment(4)) ? $this->uri->segment(4) : $this->input->post('id', TRUE);
		$id = ($id != 0) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

		//get the $page and sanitize
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : $this->input->post('page', TRUE);
		$page = ($page != 0) ? filter_var($page, FILTER_VALIDATE_INT) : NULL;

		//redirect if it´s no correct
		if (!$id) {
			$this->session->set_flashdata('message', array(
				'type' => 'warning',
				'text' => lang('web_object_not_exist')
			));
			redirect('admin/vehicles/');
		}

		//variables for check the upload
		$form_data_aux   = array();
		$files_to_delete = array();
		//Select 1:N data
		$this->template->set('array_category', category::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_status', status::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_slide', slide::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_vehicle_template', vehicle_template::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_engine', engine::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_cockpit_option', cockpit_option::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_bedroom_layout', bedroom_layout::find('all', array(
			'order' => 'name ASC'
		)));
		$this->template->set('array_bath_layout', bath_layout::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_furniture', furniture::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_flooring', flooring::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_interior_equipment', interior_equipment::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_exterior_equipment', exterior_equipment::find('all', array(
			'order' => 'name ASC'
		)));
		//Select 1:N data
		$this->template->set('array_exterior_equipment', exterior_equipment::find('all', array(
			'order' => 'name ASC'
		)));
		//Rules for validation
		$this->set_rules($id);

		//create control variables
		$this->template->title(lang('web_edit_t', array(
			':name' => 'vehicles'
		)));
		$this->template->set('updType', 'edit');
		$this->template->set('page', $page);

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			//search the item to show in edit form
			$veh = Vehicle::find_by_id($id);
			$this->template->set('vehicle', $veh);
			$this->template->set_layout(NULL);
			$this->template->set('upload_list', $this->template->build('uploads/upload_list', array(), true));
            $this->template->set('upload_dropzone', $this->template->build('uploads/dropzone', array(), true));
            $this->template->set_layout('backend');
			//load the view
			$this->template->build('vehicles/create');
		} else {
			// build array for the model
			$form_data = array(
				'id' => $this->input->post('id', TRUE),
				'category_id' => set_value('category_id'),
				'vehicle_condition' => set_value('vehicle_condition'),
				'status_id' => set_value('status_id'),
				'template_id' => set_value('template_id'),
				'asking_price' => set_value('asking_price'),
				'sale_price' => set_value('sale_price'),
				'web_special' => set_value('web_special'),
				'clearance' => set_value('clearance'),
				'year' => set_value('year'),
				'make' => set_value('make'),
				'model' => set_value('model'),
				'length' => set_value('length'),
				'series' => set_value('series'),
				'item_number' => set_value('item_number'),
				'vin' => set_value('vin'),
				'mileage' => set_value('mileage'),
				'description' => set_value('description'),
				'short_description' => set_value('short_description'),
				'engine_id' => set_value('engine_id'),
				'fuel_type' => set_value('fuel_type'),
				'generator_make' => set_value('generator_make'),
				'generator_kw' => set_value('generator_kw'),
				'generator_hours' => set_value('generator_hours'),
				'generator_type' => set_value('generator_type'),
				'hide_generator_hours' => set_value('hide_generator_hours'),
				'chassis' => set_value('chassis'),
				'map_price' => set_value('map_price'),
				'model_number' => set_value('model_number'),
				'transmission' => set_value('transmission'),
				'title' => set_value('title'),
				'video_embed' => set_value('video_embed'),
				'tagline' => set_value('tagline'),
				'warranty_title' => set_value('warranty_title'),
				'warranty_description' => set_value('warranty_description'),
				'drivetrain' => set_value('drivetrain'),
				'style' => set_value('style'),
				'cockpit_option_id' => set_value('cockpit_option_id'),
				'bedroom_layout_id' => set_value('bedroom_layout_id'),
				'furniture_id' => set_value('furniture_id'),
				'flooring_id' => set_value('flooring_id'),
				'slide_id' => set_value('slide_id'),
				'interior_color' => set_value('interior_color'),
				'exterior_color' => set_value('exterior_color'),
				'featured_special' => set_value('featured_special')
			);

			//add the aux form data to the form data array to save
			$form_data = array_merge($form_data_aux, $form_data);

			//find the item to update
			$vehicle = Vehicle::find($this->input->post('id', TRUE));

			$vehicle->update_attributes($form_data);

			$this->add_options($vehicle);
			// run insert model to write data to db
			if ($vehicle->is_valid()) // the information has therefore been successfully saved in the db
			{

			    $this->generate_description($this->input->post('id', TRUE));

				$this->session->set_flashdata('message', array(
					'type' => 'success',
					'text' => lang('web_edit_success')
				));
				redirect("/admin/vehicles/" . $page);
			}

			if ($vehicle->is_invalid()) {
				$this->session->set_flashdata('message', array(
					'type' => 'error',
					'text' => $vehicle->errors->full_messages()
				));
				redirect("/admin/vehicles/" . $page);
			}
		}
	}

	private function generate_description($id){
    	if($this->input->post('update_description')){
    	    $vehicle = Vehicle::find_by_id($id);
            $msg = "";
            if(!empty($vehicle->year) && !empty($vehicle->make) && !empty($vehicle->model)){
            	$msg .= "{$vehicle->year} {$vehicle->make} {$vehicle->model} {$vehicle->model_number} {$vehicle->slide} {$vehicle->category}. ";
            }
            //if(isset($chassis) && isset($engine) && isset($horsepower) && isset($miles)){
            	$msg .= "This coach is built on a {$vehicle->chassis} chassis and powered by a ". $this->implode_names(', ', $vehicle->engines) . " HP Engine with only {$vehicle->mileage} miles! ";
            //}
            if($vehicle->exterior_equipments && $vehicle->cockpit_options && $vehicle->interior_equipments){
            	$msg .= "Equipment includes: ". $this->implode_names(', ', $vehicle->exterior_equipments) . ", ". $this->implode_names(', ', $vehicle->cockpit_options) . ", and ". $this->implode_names(', ', $vehicle->interior_equipments) . ". ";
            }else if($vehicle->exterior_equipments && $vehicle->interior_equipments){
                $msg .= "Equipment includes: ". $this->implode_names(', ', $vehicle->exterior_equipments) . ", and ". $this->implode_names(', ', $vehicle->interior_equipments) . ". ";

            }
            if(!empty($vehicle->generator_make) && !empty($vehicle->generator_kw)
                && !empty($vehicle->generator_type) && !empty($vehicle->generator_hours)){
            	$msg .= "Equipped with a {$vehicle->generator_make} {$vehicle->generator_kw}KW {$vehicle->generator_type} Generator";
            	if(empty($vehicle->hide_generator_hours)){
            		$msg .= " with only {$vehicle->generator_hours} hours. ";
            	} else {
            		$msg .= '.';
            	}

            }else if(!empty($vehicle->generator_hours)){
            	$msg .= "Equipped with Generator";
            	if(empty($vehicle->hide_generator_hours)){
            		$msg .= " with only {$vehicle->generator_hours} hours. ";
            	} else {
            		$msg .= '.';
            	}
            }
            $msg .= "The Floorplan features: {$vehicle->slide}, ". $this->implode_names(', ', $vehicle->furniture) . ", ". $this->implode_names(', ', $vehicle->flooring) . ", ". $this->implode_names(', ', $vehicle->bath_layouts) . ", ". $this->implode_names(', ', $vehicle->bedroom_layouts) . ". ";
            $msg .= "Asking only " . $vehicle->asking_price .  "!  Item #{$vehicle->item_number}  DeMartini RV Sales";

            $vehicle->update_attributes(array('description' => $msg));
        }
	}

	private function implode_names($sep, $arr){
	    $names = array();
    	if($arr && is_array($arr)){
        	foreach($arr as $it)
        	    $names[] = $it->name;
    	}
    	return implode($sep, $names);
	}


	function delete($id = NULL, $page = 1)
	{
		$files_to_delete = array();

		//filter & Sanitize $id
		$id = ($id != 0) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

		//redirect if it´s no correct
		if (!$id) {
			$this->session->set_flashdata('message', array(
				'type' => 'warning',
				'text' => lang('web_object_not_exist')
			));

			redirect('vehicles');
		}

		//search the item to delete
		if (Vehicle::exists($id)) {
			$vehicle = Vehicle::find($id);
		} else {
			$this->session->set_flashdata('message', array(
				'type' => 'warning',
				'text' => lang('web_object_not_exist')
			));

			redirect('vehicles');
		}



		//delete the item
		if ($vehicle->delete() == TRUE) {
			$this->session->set_flashdata('message', array(
				'type' => 'success',
				'text' => lang('web_delete_success')
			));
		} else {
			$this->session->set_flashdata('message', array(
				'type' => 'error',
				'text' => lang('web_delete_failed')
			));
		}

		redirect("/admin/vehicles/");
	}


	private function set_rules($id = NULL)
	{
		//Creamos los parametros de la funcion del constructor.
		// More validations: http://codeigniter.com/user_guide/libraries/form_validation.html

		$this->form_validation->set_rules('category_id', 'category_id', 'required|xss_clean');

		$this->form_validation->set_rules('vehicle_condition', 'vehicle_condition', 'required|xss_clean');

		$this->form_validation->set_rules('status_id', 'status_id', 'required|xss_clean');

		$this->form_validation->set_rules('template_id', 'template_id', 'xss_clean');

		$this->form_validation->set_rules('asking_price', 'asking_price', 'trim|xss_clean|min_length[0]|max_length[12]');

		$this->form_validation->set_rules('sale_price', 'sale_price', 'trim|xss_clean|min_length[0]|max_length[12]');

		$this->form_validation->set_rules('web_special', 'web_special', 'xss_clean');

		$this->form_validation->set_rules('featured_special', 'featured_special', 'xss_clean');

		$this->form_validation->set_rules('clearance', 'clearance', 'xss_clean');

		$this->form_validation->set_rules('year', 'year', 'required|trim|xss_clean|min_length[0]|max_length[4]');

		$this->form_validation->set_rules('make', 'make', 'required|trim|xss_clean|min_length[0]|max_length[32]');

		$this->form_validation->set_rules('model', 'model', 'required|trim|xss_clean|min_length[0]|max_length[32]');

		$this->form_validation->set_rules('length', 'length', 'trim|xss_clean|min_length[0]|max_length[2]');

		$this->form_validation->set_rules('series', 'series', 'trim|xss_clean|min_length[0]|max_length[32]');

		$this->form_validation->set_rules('item_number', 'item_number', 'required|trim|xss_clean|min_length[0]|max_length[10]');

		$this->form_validation->set_rules('vin', 'vin', 'required|trim|xss_clean|min_length[0]|max_length[100]');

		$this->form_validation->set_rules('mileage', 'mileage', 'required|trim|xss_clean|min_length[0]|max_length[12]');

		$this->form_validation->set_rules('description', 'description', 'trim|min_length[0]');

		$this->form_validation->set_rules('short_description', 'short_description', 'trim|min_length[0]|max_length[255]');

		$this->form_validation->set_rules('engine_id', 'engine_id', 'xss_clean');

		$this->form_validation->set_rules('fuel_type', 'fuel_type', 'xss_clean');

		$this->form_validation->set_rules('generator_make', 'generator_make', 'trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('generator_kw', 'generator_kw', 'trim|xss_clean|min_length[0]|max_length[32]');

		$this->form_validation->set_rules('generator_hours', 'generator_hours', 'trim|xss_clean|min_length[0]|max_length[32]');

		$this->form_validation->set_rules('generator_type', 'generator_type', 'xss_clean');

		$this->form_validation->set_rules('hide_generator_hours', 'hide_generator_hours', 'xss_clean');

		$this->form_validation->set_rules('chassis', 'chassis', 'trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('map_price', 'map_price', 'trim|xss_clean|numeric|min_length[0]|max_length[22]');

		$this->form_validation->set_rules('model_number', 'model_number', 'trim|xss_clean|min_length[0]|max_length[16]');

		$this->form_validation->set_rules('transmission', 'transmission', 'trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('title', 'title', 'trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('video_embed', 'video_embed', 'trim');

		$this->form_validation->set_rules('tagline', 'tagline', 'trim|xss_clean|min_length[0]|max_length[100]');

		$this->form_validation->set_rules('warranty_title', 'warranty_title', 'trim|xss_clean|min_length[0]|max_length[255]');

		$this->form_validation->set_rules('warranty_description', 'warranty_description', 'trim|xss_clean|min_length[0]|max_length[1000]');

		$this->form_validation->set_rules('drivetrain', 'drivetrain', 'trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('style', 'style', 'trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('cockpit_option_id', 'cockpit_option_id', 'xss_clean');

		$this->form_validation->set_rules('bedroom_layout_id', 'bedroom_layout_id', 'xss_clean');

		$this->form_validation->set_rules('furniture_id', 'furniture_id', 'xss_clean');

		$this->form_validation->set_rules('flooring_id', 'flooring_id', 'xss_clean');

		$this->form_validation->set_rules('interior_equipment_id', 'interior_equipment_id', 'xss_clean');

		$this->form_validation->set_rules('exterior_equipment_id', 'exterior_equipment_id', 'xss_clean');

		$this->form_validation->set_rules('slide_id', 'slide_id', 'xss_clean');

		$this->form_validation->set_rules('interior_color', 'interior_color', 'trim|xss_clean|min_length[0]|max_length[32]');

		$this->form_validation->set_rules('exterior_color', 'exterior_color', 'trim|xss_clean|min_length[0]|max_length[32]');
		$this->form_validation->set_error_delimiters("<br /><span class='error'>", '</span>');
	}


	private function set_paginate_options()
	{
		$config = array();

		$config['base_url'] = site_url() . 'admin/vehicles';

		$config['use_page_numbers'] = TRUE;

		$config['per_page'] = 100;

		$config['uri_segment'] = 3;

		$config['first_link']      = "<< " . lang('web_first');
		$config['first_tag_open']  = "<span class='pag'>";
		$config['first_tag_close'] = '</span>';

		$config['last_link']      = lang('web_last') . " >>";
		$config['last_tag_open']  = "<span class='pag'>";
		$config['last_tag_close'] = '</span>';

		$config['next_link']      = FALSE;
		$config['next_tag_open']  = "<span class='pag'>";
		$config['next_tag_close'] = '</span>';

		$config['prev_link']      = FALSE;
		$config['prev_tag_open']  = "<span class='pag'>";
		$config['prev_tag_close'] = '</span>';

		$config['cur_tag_open']  = "<span class='pag pag_active'>";
		$config['cur_tag_close'] = '</span>';

		$config['num_tag_open']  = "<span class='pag'>";
		$config['num_tag_close'] = '</span>';

		$config['full_tag_open']  = "<div class='navigation'>";
		$config['full_tag_close'] = '</div>';

		//$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 10;

		return $config;
	}

	public function import(){
	    if(empty($_POST)){
			$this->template->set_layout('backend');
			//load the view
			$this->template->build('vehicles/import');
		} else {
			$file = $this->upload_csv();
			if($file) {
				$vehicles = $this->parse_csv_file($file);
                $data = array(
        			'skipped' => 0,
        			'failed' => 0,
        			'successful' => 0,
        		);
        		foreach($vehicles as $vehicle){
            		if(empty($vehicle['vin'])){
        				$data['skipped']++;
        				continue;
        			}
        			$found = Vehicle::find('all', array('conditions' => "item_number LIKE '{$vehicle['item_number']}'"));
        			if(!empty($found[0]->id)){
        				$data['skipped']++;
        				continue;
        			}
        			$form_data = array(
        				'category_id' => set_value('category_id'),
        				'vehicle_condition' => set_value('vehicle_condition'),
        				'status_id' => '4', // Set to Inactive
        				'template_id' => set_value('template_id'),
        				'asking_price' => set_value('asking_price'),
        				'sale_price' => set_value('sale_price'),
        				'web_special' => set_value('web_special'),
        				'clearance' => set_value('clearance'),
        				'year' => date('Y'),
        				'make' => set_value('make'),
        				'model' => set_value('model'),
        				'length' => set_value('length'),
        				'series' => set_value('series'),
        				'item_number' => set_value('item_number'),
        				'vin' => set_value('vin'),
        				'mileage' => 0,
        				'description' => '',
        				'engine_id' => set_value('engine_id'),
        				'fuel_type' => set_value('fuel_type'),
        				'generator_make' => set_value('generator_make'),
        				'generator_kw' => set_value('generator_kw'),
        				'generator_hours' => set_value('generator_hours'),
        				'generator_type' => set_value('generator_type'),
        				'chassis' => set_value('chassis'),
        				'map_price' => set_value('map_price'),
        				'model_number' => set_value('model_number'),
        				'transmission' => set_value('transmission'),
        				'title' => set_value('title'),
        				'tagline' => set_value('tagline'),
        				'warranty_title' => set_value('warranty_title'),
        				'warranty_description' => set_value('warranty_description'),
        				'drivetrain' => set_value('drivetrain'),
        				'style' => set_value('style'),
        				'cockpit_option_id' => set_value('cockpit_option_id'),
        				'bedroom_layout_id' => set_value('bedroom_layout_id'),
        				'furniture_id' => set_value('furniture_id'),
        				'flooring_id' => set_value('flooring_id'),
        				'slide_id' => set_value('slide_id'),
        				'interior_color' => set_value('interior_color'),
        				'exterior_color' => set_value('exterior_color')
        			);
        			$fields = array_merge($form_data, $vehicle);
        			$vehicle = Vehicle::create($fields);

        			if($vehicle->is_valid()){
        			    Vehicleengine::create(array(
            				'engine_id' => $fields['engine_id'],
            				'vehicle_id' => $vehicle->id
            			));
            			$data['successful']++;
        			}

        			if($vehicle->is_invalid()){
        			    //echo "<pre>";
        			    //var_dump($fields);
        			    //echo "</pre>";
        			    //die();
        				$data['failed']++;
                    }

        		}
        		$this->template->set('res', $data);
        		$this->template->build('vehicles/import_results.php');
			} else {
				$this->session->set_flashdata('message', array(
					'type' => 'error',
					'text' => 'Failed to upload file'
				));
				redirect('admin/vehicles');
			}
		}
	}

	private function get_import_val($h, $val){
	    $val = trim($val);
	    if($val == '') return false;
	    switch(trim($h)){
	    case 'Stock #':
	        return array('item_number', $val);
	    case 'Year':
	        return array('year', $val);
	    case 'Make':
    	    return array('make', $val);
	    case 'Model':
    	    return array('model', $val);
	    //case 'Vehicle Type':
        //    return array('category_id', $this->new_record_by_name('Category', $val));
	    case 'Length':
            return array('length', $val);
	    case 'Style':
    	    return array('style', $val);
	    case 'Series':
                return array('model_number', $val);
            case 'Is New':
                return array('vehicle_condition', (($val == "true") ? "new" : "used"));
	    case 'New/Used':
	        return array('vehicle_condition', strtolower($val));
	    case 'Mileage':
    	        return array('mileage', str_replace(',', '', $val));
	    case 'Vin':
	    case 'VIN Number':
    	        return array('vin', $val);
	    //case 'Eng Size':
	    //    return array('engine_id', $this->new_record_by_name('Engine', $val));
            case 'Fuel':
            case 'Fuel Type':
	        return array('fuel_type', $val);
	    case 'Transmission':
	        return array('transmission', $val);
            case 'Drivetrain':
            case 'Drive Train':
	        return array('drivetrain', $val);
            case 'Price Internet':
	    case 'Internet':
	        return array('asking_price', str_replace(',', '', $val));
            default:
                return false;
	    }
	}

	private function new_record_by_name($model, $name){
		$this->load->model($model);
		$item = $model::first(array('conditions' => "name LIKE '$name'" ));
		if(!empty($item)){
		    return $item->id;
		}
		$obj = $model::create(array(
			'name' => $name
		));
		return $obj->id;
	}

	private function parse_csv_file($file){
	    ini_set('auto_detect_line_endings', true);
		$this->load->library('csv_parser');
		$csvData = $this->csv_parser->csv_file_to_array($file);
		$headers = $csvData[0];

		$data = array();
		for($i=1;$i < count($csvData);$i++){
		    // overwirte with csv data
			for($h=0;$h<count($headers);$h++){
				$field = isset($csvData[$i][$headers[$h]]) ? $csvData[$i][$headers[$h]] : "";

				if(!empty($field)){
				    $ar = $this->get_import_val($headers[$h], $field);
				    if(!empty($ar))
    				    $data[$i - 1][$ar[0]] = $ar[1];
				}
			}
		}

		return $data;
	}

	private function upload_csv(){
	    $path = FCPATH . 'public/uploads/import/';
	    if(!is_dir($path)){
    	   mkdir($path);
	    }
		$config['upload_path'] = $path;
		$config['allowed_types'] = '*'; // tried restricting to csv|txt. txt worked, csv didn't. need to troubleshoot. might just be my local box
		$config['max_size'] = 2048; // if not enough, you need to change php.ini too
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if($this->upload->do_upload("csv")){
			$upload = array('upload_data' => $this->upload->data());
			$file = $upload['upload_data']['file_name'];
			return $path . $file;
		} else {
			//die($this->upload->display_errors());
			return false;
		}
	}

	public function import_from_webmanager(){
	    $reload_imgs = false; // SET TO FALSE IN PRODUCTION
	    $import_images = false;
		$this->load->library('Automanager');
		$this->load->library('curl');
		$this->load->library('image_lib');
		$vehicles = $this->automanager->get_latest();
		$this->template->set('vehicles', $vehicles);
		$data = array(
			'skipped' => 0,
			'failed' => 0,
			'successful' => 0,
		);
		foreach($vehicles as $item){
			$found = Vehicle::find('all', array('conditions' => "item_number LIKE '{$item['fields']['item_number']}'"));
			if(!empty($found[0]->id)){
			    $is_front = 1;
			    if($reload_imgs){
    			    Vehicleimages::table()->delete(array(
            			'vehicle_id' => $found[0]->id
            		));
        			foreach($item['images'] as $x => $url){
        				$image_id = $this->download_image_from_url($url);
        				$form_data = array(
        					'title' => $item['fields']['tagline'] . ' ' . $x,
        					'is_front' => $is_front,
        					'position' => $x,
        					'description' => $item['fields']['tagline'] . ' ' . $x,
        					'image' => $image_id,
        					'public' => 1,
        					'group_id' => 0
        				);
        				$image = Image::create($form_data);

        				Vehicleimages::create(array(
        					'image_id' => $image->id,
        					'vehicle_id' => $found[0]->id
        				));

        				$if_front = 0;
        			}
    			}

				$data['skipped']++;
				continue;
			}
			$form_data = array(
				'category_id' => set_value('category_id'),
				'vehicle_condition' => set_value('vehicle_condition'),
				'status_id' => '4', // Set to Inactive
				'template_id' => set_value('template_id'),
				'asking_price' => set_value('asking_price'),
				'sale_price' => set_value('sale_price'),
				'web_special' => set_value('web_special'),
				'clearance' => set_value('clearance'),
				'year' => set_value('year'),
				'make' => set_value('make'),
				'model' => set_value('model'),
				'length' => set_value('length'),
				'series' => set_value('series'),
				'item_number' => set_value('item_number'),
				'vin' => set_value('vin'),
				'mileage' => set_value('mileage'),
				'description' => set_value('description'),
				'engine_id' => set_value('engine_id'),
				'fuel_type' => set_value('fuel_type'),
				'generator_make' => set_value('generator_make'),
				'generator_kw' => set_value('generator_kw'),
				'generator_hours' => set_value('generator_hours'),
				'generator_type' => set_value('generator_type'),
				'chassis' => set_value('chassis'),
				'map_price' => set_value('map_price'),
				'model_number' => set_value('model_number'),
				'transmission' => set_value('transmission'),
				'title' => set_value('title'),
				'tagline' => set_value('tagline'),
				'warranty_title' => set_value('warranty_title'),
				'warranty_description' => set_value('warranty_description'),
				'drivetrain' => set_value('drivetrain'),
				'style' => set_value('style'),
				'cockpit_option_id' => set_value('cockpit_option_id'),
				'bedroom_layout_id' => set_value('bedroom_layout_id'),
				'furniture_id' => set_value('furniture_id'),
				'flooring_id' => set_value('flooring_id'),
				'slide_id' => set_value('slide_id'),
				'interior_color' => set_value('interior_color'),
				'exterior_color' => set_value('exterior_color')
			);
			$fields = array_merge($form_data, $item['fields']);
			$vehicle = Vehicle::create($fields);
			$is_front = 1;
			if($import_images && !empty($item['images'])){
    			foreach($item['images'] as $x => $url){
    				$image_id = $this->download_image_from_url($url);
    				$form_data = array(
    					'title' => $item['fields']['tagline'] . ' ' . $x,
    					'is_front' => $is_front,
    					'position' => $x,
    					'description' => $item['fields']['tagline'] . ' ' . $x,
    					'image' => $image_id,
    					'public' => 1,
    					'group_id' => 0
    				);
    				$image = Image::create($form_data);

    				Vehicleimages::create(array(
    					'image_id' => $image->id,
    					'vehicle_id' => $vehicle->id
    				));

    				$if_front = 0;
    			}
			}
			if($vehicle->is_valid())
				$data['successful']++;

			if($vehicle->is_invalid())
				$data['failed']++;
		}
		$this->template->set('res', $data);
		$this->template->build('vehicles/import_results.php');
	}

	private function download_image_from_url($url){
		$image_id = $this->getRandomString(32) . '.' . pathinfo($url, PATHINFO_EXTENSION);
		$info_upload = array(
			'file_name' => $image_id
		);
		$fp = fopen(FCPATH . 'public/uploads/images/img/' . $info_upload['file_name'], 'wb');
		$this->curl->create($url);
		$this->curl->options(array(
			CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9) Gecko/2008052906 Firefox/3.0",
		));
		$this->curl->post(array());
		$raw = $this->curl->execute();
		fwrite($fp, $raw);
		fclose($fp);
		$this->image_lib->initialize($this->set_thumbnail_options($info_upload, 'images', 'image'));
		$this->image_lib->resize();
		return $image_id;
	}

	private function set_thumbnail_options($info_upload, $controller, $field){
		$config                  = array();
		$config['image_library'] = 'gd2';
		$config['source_image']  = FCPATH . 'public/uploads/' . $controller . '/img/' . $info_upload["file_name"];
		$config['new_image']     = FCPATH . 'public/uploads/' . $controller . '/img/thumbs/' . $info_upload["file_name"];
		$config['create_thumb']  = TRUE;

		if ($field == 'image') {
			$config['maintain_ratio'] = TRUE;
			$config['master_dim']     = 'width';
			$config['width']          = 250;
			$config['height']         = 250;
			$config['thumb_marker']   = '';
		}

		return $config;
	}

	private function getRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$string = '';

		for ($i = 0; $i < $length; $i++) {
			$string .= $characters[mt_rand(0, strlen($characters) - 1)];
		}

		return $string;
	}
}
