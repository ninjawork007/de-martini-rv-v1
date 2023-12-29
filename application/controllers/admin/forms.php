<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends MY_Controller
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
		$this->template->title(lang('web_list_of', array(':name' => 'forms')));

		//set the pagination configuration array and initialize the pagination
		$config = $this->set_paginate_options();

		//Initialize the pagination class
		$this->pagination->initialize($config);

		//control of number page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		//find all the categories with paginate and save it in array to past to the view
		$this->template->set('forms', Form::paginate_all($config['per_page'], $page));

		//create paginate´s links
		$this->template->set('links', $this->pagination->create_links());

		//control variables
		$this->template->set('page', $page);

		//Load view
		$this->template->build('forms/list');
	}


	function create($page = NULL) 
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());
		//ckeditor scripts
	  	$this->template->append_metadata("<script src='js/ckeditor/ckeditor.js' type='text/javascript'></script>");
	  				
		//create control variables
		$form_data_aux 	= 	array();
		$this->template->title(lang('web_create_t', array(':name' => 'forms')));
		$this->template->set('updType', 'create');
		$this->template->set('page', ( $this->uri->segment(4) )  ? $this->uri->segment(4) : $this->input->post('page', TRUE));

		//Rules for validation
		$this->set_rules();

		//validate the fields of form
		if ($this->form_validation->run() == FALSE) 
		{
			//Load view
			$this->template->build('forms/create');	
		}
		else
		{
			//Validation OK!
			$form_data = array(
				'name' => set_value('name'), 
				'to_emails' => set_value('to_emails'), 
				'cc_emails' => set_value('cc_emails'), 
				'send_copy_to_customer' => set_value('send_copy_to_customer'), 
				'description' => set_value('description')
			);



			$form = Form::create($form_data);

			if ( $form->is_valid() ) // the information has therefore been successfully saved in the db
			{
				$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_create_success') ));
			}
			
			if ( $form->is_invalid() )
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => $form->errors->full_messages() ));
			}

			redirect('/admin/forms/');
		
	  	} 
	}


	function edit($id = FALSE, $page = 1) 
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());
		//ckeditor scripts
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
			redirect('admin/forms/');
		}

		//variables for check the upload
		$form_data_aux			= array();
		$files_to_delete 		= array();
		
		//Rules for validation
		$this->set_rules($id);

		//create control variables
		$this->template->title(lang('web_edit_t', array(':name' => 'forms')));
		$this->template->set('updType', 'edit');
		$this->template->set('page', $page);

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			//search the item to show in edit form
			$this->template->set('form', Form::find_by_id($id));
			
			//load the view
			$this->template->build('forms/create');	
		}
		else
		{	
			// build array for the model
			$form_data = array(
					       	'id'	=> $this->input->post('id', TRUE),
							'name' => set_value('name'), 
							'to_emails' => set_value('to_emails'), 
							'cc_emails' => set_value('cc_emails'), 
							'send_copy_to_customer' => set_value('send_copy_to_customer'), 
							'description' => set_value('description')
						);

			//add the aux form data to the form data array to save
			$form_data = array_merge($form_data_aux, $form_data);
		
			//find the item to update
			$form = Form::find($this->input->post('id', TRUE));
			$form->update_attributes($form_data);

			// run insert model to write data to db
			if ( $form->is_valid()) // the information has therefore been successfully saved in the db
			{

				$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_edit_success') ));
				redirect("/admin/forms/".$page);
			}

			if ($form->is_invalid())
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => $form->errors->full_messages() ) );
				redirect("/admin/forms/".$page);
			}	
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
			
			redirect('forms');
		}
		
		//search the item to delete
		if ( Form::exists($id) )
		{
			$form = Form::find($id);
		}
		else
		{
			$this->session->set_flashdata('message', array( 'type' => 'warning', 'text' => lang('web_object_not_exist') ) );
			
			redirect('forms');		
		}

		

		//delete the item
		if ( $form->delete() == TRUE) 
		{
			$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_delete_success') ));
		}
		else
		{
			$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => lang('web_delete_failed') ) );
		}	

		redirect("/admin/forms/");
	}


	private function set_rules($id = NULL)
	{
		//Creamos los parametros de la funcion del constructor.
		// More validations: http://codeigniter.com/user_guide/libraries/form_validation.html

		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|min_length[0]|max_length[60]');

		$this->form_validation->set_rules('to_emails', 'to_emails', 'required|trim|min_length[0]|max_length[500]');
					
		$this->form_validation->set_rules('cc_emails', 'cc_emails', 'required|trim|min_length[0]|max_length[500]');
					
		$this->form_validation->set_rules('send_copy_to_customer', 'send_copy_to_customer', 'xss_clean');
					
		$this->form_validation->set_rules('description', 'description', 'trim|min_length[0]|max_length[500]');
							$this->form_validation->set_error_delimiters("<br /><span class='error'>", '</span>');
	}		

	
	private function set_paginate_options()
	{
		$config = array();

		$config['base_url'] = site_url() . 'admin/forms';

		$config['use_page_numbers'] = TRUE;

	    $config['per_page'] = 10;

		$config['total_rows'] = Form::count();

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