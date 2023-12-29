<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_specifics extends MY_Controller
{
	protected $before_filter = array(
		'action' => 'is_logged_in'
		//'except' => array(),
		//'only' => array()
	);

	function __construct()
	{
		parent::__construct();

		$this->template->set_layout('backend');
	}


	public function index()
	{
		//set the title of the page
		$this->template->title(lang('web_list_of', array(':name' => 'Model Specifics')));

		//set the pagination configuration array and initialize the pagination
		$config = $this->set_paginate_options();

		//Initialize the pagination class
		$this->pagination->initialize($config);

		//control of number page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		//find all the categories with paginate and save it in array to past to the view
		$this->template->set('model_specifics', Model_specific::paginate_all($config['per_page'], $page));

		//create paginate´s links
		$this->template->set('links', $this->pagination->create_links());

		//control variables
		$this->template->set('page', $page);

		//Load view
		$this->template->build('model_specifics/list');
	}


	function create($page = NULL)
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());

        $this->template->append_metadata("<script src='js/ckeditor/ckeditor.js' type='text/javascript'></script>");

		//create control variables
		$form_data_aux 	= 	array();
		$this->template->title(lang('web_create_t', array(':name' => 'Model Specifics')));
		$this->template->set('updType', 'create');
		$this->template->set('page', ( $this->uri->segment(4) )  ? $this->uri->segment(4) : $this->input->post('page', TRUE));

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
		$this->set_rules();

		//validate the fields of form
		if ($this->form_validation->run() == FALSE)
		{
			//Load view
			$this->template->build('model_specifics/create');
		}
		else
		{
			//Validation OK!
			$form_data = array(
				'year' => set_value('year'),
				'make' => set_value('make'),
				'model' => set_value('model'),
				'manufacture_url' => set_value('manufacture_url'),
				'manufacture_list' => set_value('manufacture_list'),
                'generator_make' => set_value('generator_make'),
                'generator_type' => set_value('generator_type'),
                'generator_kw' => set_value('generator_kw'),
                'generator_hours' => set_value('generator_hours'),
                'chassis' => set_value('chassis'),
                'engine' => set_value('engine'),
                'description' => set_value('description'),
            );


            var_dump($form_data);
			$model_specific = Model_specific::create($form_data);
			$this->add_options($model_specific);

			if ( $model_specific->is_valid() ) // the information has therefore been successfully saved in the db
			{
				$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_create_success') ));
			}

			if ( $model_specific->is_invalid() )
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => $model_specific->errors->full_messages() ));
			}

			redirect('/admin/model_specifics/');

	  	}
	}


	function edit($id = FALSE, $page = 1)
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());

        $this->template->append_metadata("<script src='js/ckeditor/ckeditor.js' type='text/javascript'></script>");

		//get the $id and sanitize
		$id = ( $this->uri->segment(4) )  ? $this->uri->segment(4) : $this->input->post('id', TRUE);
		$id = ( $id != 0 ) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

		//get the $page and sanitize
		$page = ( $this->uri->segment(5) )  ? $this->uri->segment(5) : $this->input->post('page', TRUE);
		$page = ( $page != 0 ) ? filter_var($page, FILTER_VALIDATE_INT) : NULL;

		//redirect if it´s no correct
		if (!$id){
			$this->session->set_flashdata('message', array( 'type' => 'warning', 'text' => lang('web_object_not_exist') ) );
			redirect('admin/model_specifics/');
		}

		//variables for check the upload
		$form_data_aux			= array();
		$files_to_delete 		= array();

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
		$this->template->title(lang('web_edit_t', array(':name' => 'Model Specifics')));
		$this->template->set('updType', 'edit');
		$this->template->set('page', $page);

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			//search the item to show in edit form
			$this->template->set('model_specific', Model_specific::find_by_id($id));

			//load the view
			$this->template->build('model_specifics/create');
		}
		else
		{
			// build array for the model
			$form_data = array(
					       	'id'	=> $this->input->post('id', TRUE),
							'year' => set_value('year'),
							'make' => set_value('make'),
							'model' => set_value('model'),
							'manufacture_url' => set_value('manufacture_url'),
							'manufacture_list' => set_value('manufacture_list'),
							'generator_make' => set_value('generator_make'),
							'generator_type' => set_value('generator_type'),
							'generator_kw' => set_value('generator_kw'),
							'generator_hours' => set_value('generator_hours'),
							'chassis' => set_value('chassis'),
							'engine' => set_value('engine'),
							'description' => set_value('description'),
						);

			//add the aux form data to the form data array to save
			$form_data = array_merge($form_data_aux, $form_data);

			//find the item to update
			$model_specific = Model_specific::find($this->input->post('id', TRUE));
			$model_specific->update_attributes($form_data);

			$this->add_options($model_specific);

			// run insert model to write data to db
			if ( $model_specific->is_valid()) // the information has therefore been successfully saved in the db
			{

				$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_edit_success') ));
				redirect("/admin/model_specifics/".$page);
			}

			if ($model_specific->is_invalid())
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => $model_specific->errors->full_messages() ) );
				redirect("/admin/model_specifics/".$page);
			}
	  	}
	}

    private function add_options($modelspecific)
	{
		Modelspecificexteriorequipment::table()->delete(array(
			'model_specific_id' => $modelspecific->id
		));
		foreach ($this->input->post('exterior_equipments') as $id) {
			Modelspecificexteriorequipment::create(array(
				'exterior_equipment_id' => $id,
				'model_specific_id' => $modelspecific->id
			));
		}
		Modelspecificinteriorequipment::table()->delete(array(
			'model_specific_id' => $modelspecific->id
		));
		foreach ($this->input->post('interior_equipments') as $id) {
			Modelspecificinteriorequipment::create(array(
				'interior_equipment_id' => $id,
				'model_specific_id' => $modelspecific->id
			));
		}
		Modelspecificflooring::table()->delete(array(
			'model_specific_id' => $modelspecific->id
		));
		foreach ($this->input->post('flooring') as $id) {
			Modelspecificflooring::create(array(
				'flooring_id' => $id,
				'model_specific_id' => $modelspecific->id
			));
		}
		Modelspecificfurniture::table()->delete(array(
			'model_specific_id' => $modelspecific->id
		));
		foreach ($this->input->post('furniture') as $id) {
			Modelspecificfurniture::create(array(
				'furniture_id' => $id,
				'model_specific_id' => $modelspecific->id
			));
		}

		Modelspecificbathlayouts::table()->delete(array(
			'model_specific_id' => $modelspecific->id
		));
		foreach ($this->input->post('bath_layouts') as $id) {
			Modelspecificbathlayouts::create(array(
				'bath_layout_id' => $id,
				'model_specific_id' => $modelspecific->id
			));
		}

		Modelspecificbedroomlayouts::table()->delete(array(
			'model_specific_id' => $modelspecific->id
		));
		foreach ($this->input->post('bedroom_layouts') as $id) {
			Modelspecificbedroomlayouts::create(array(
				'bedroom_layout_id' => $id,
				'model_specific_id' => $modelspecific->id
			));
		}

		Modelspecificcockpitoptions::table()->delete(array(
			'model_specific_id' => $modelspecific->id
		));
		foreach ($this->input->post('cockpit_options') as $id) {
			Modelspecificcockpitoptions::create(array(
				'cockpit_option_id' => $id,
				'model_specific_id' => $modelspecific->id
			));
		}
	}

	function delete($id = NULL, $page = 1)
	{
		$files_to_delete = array();

		//filter & Sanitize $id
		$id = ($id != 0) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

		//redirect if it´s no correct
		if (!$id){
			$this->session->set_flashdata('message', array( 'type' => 'warning', 'text' => lang('web_object_not_exist') ) );

			redirect('model_specifics');
		}

		//search the item to delete
		if ( Model_specific::exists($id) )
		{
			$model_specific = Model_specific::find($id);
		}
		else
		{
			$this->session->set_flashdata('message', array( 'type' => 'warning', 'text' => lang('web_object_not_exist') ) );

			redirect('model_specifics');
		}



		//delete the item
		if ( $model_specific->delete() == TRUE)
		{
			$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_delete_success') ));
		}
		else
		{
			$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => lang('web_delete_failed') ) );
		}

		redirect("/admin/model_specifics/");
	}

	private function set_rules($id = NULL)
	{
		//Creamos los parametros de la funcion del constructor.
		// More validations: http://codeigniter.com/user_guide/libraries/form_validation.html

		$this->form_validation->set_rules('year', 'year', 'required|trim|xss_clean|min_length[0]|max_length[4]');

		$this->form_validation->set_rules('make', 'make', 'required|trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('model', 'model', 'required|trim|xss_clean|min_length[0]|max_length[60]');
        $this->form_validation->set_rules('generator_type', 'generator_type', 'trim|xss_clean|min_length[0]|max_length[100]');
        $this->form_validation->set_rules('generator_make', 'generator_make', 'trim|xss_clean|min_length[0]|max_length[100]');
        $this->form_validation->set_rules('generator_kw', 'generator_kw', 'trim|xss_clean|min_length[0]|max_length[100]');
        $this->form_validation->set_rules('generator_hours', 'generator_hours', 'trim|xss_clean|min_length[0]|max_length[100]');
        $this->form_validation->set_rules('chassis', 'chassis', 'trim|xss_clean|min_length[0]|max_length[100]');
        $this->form_validation->set_rules('engine', 'engine', 'trim|xss_clean|min_length[0]|max_length[100]');
		$this->form_validation->set_rules('description', 'description', 'trim|min_length[0]');

		$this->form_validation->set_rules('manufacture_url', 'manufacture_url', 'trim|xss_clean|min_length[0]|max_length[1000]');

		$this->form_validation->set_rules('manufacture_list', 'manufacture_list', 'trim|xss_clean|min_length[0]|max_length[1000]');
		$this->form_validation->set_error_delimiters("<br /><span class='error'>", '</span>');
	}


	private function set_paginate_options()
	{
		$config = array();

		$config['base_url'] = site_url() . 'admin/model_specifics';

		$config['use_page_numbers'] = TRUE;

	    $config['per_page'] = 10;

		$config['total_rows'] = Model_specific::count();

		$config['uri_segment'] = 3;

	    $config['first_link'] = "<< ".lang('web_first');
	    $config['first_tag_open'] = "<span class='pag'>";
		$config['first_tag_close'] = '</span>';

		$config['last_link'] = lang('web_last') ." >>";
		$config['last_tag_open'] = "<span class='pag'>";
		$config['last_tag_close'] = '</span>';

		$config['next_link'] = FALSE;
		$config['next_tag_open'] = "<span class='pag'>";
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = FALSE;
		$config['prev_tag_open'] = "<span class='pag'>";
		$config['prev_tag_close'] = '</span>';

	    $config['cur_tag_open'] = "<span class='pag pag_active'>";
	    $config['cur_tag_close'] = '</span>';

	    $config['num_tag_open'] = "<span class='pag'>";
	    $config['num_tag_close'] = '</span>';

	    $config['full_tag_open'] = "<div class='navigation'>";
	    $config['full_tag_close'] = '</div>';

	    $choice = $config["total_rows"] / $config["per_page"];
	    //$config["num_links"] = round($choice);

	    return $config;
	}



}