<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Floor_plans extends MY_Controller
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
		$this->template->title(lang('web_list_of', array(':name' => 'floor_plans')));

		//set the pagination configuration array and initialize the pagination
		$config = $this->set_paginate_options();

		//Initialize the pagination class
		$this->pagination->initialize($config);

		//control of number page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		//find all the categories with paginate and save it in array to past to the view
		$this->template->set('floor_plans', Floor_plan::paginate_all($config['per_page'], $page));

		//create paginate´s links
		$this->template->set('links', $this->pagination->create_links());

		//control variables
		$this->template->set('page', $page);

		//Load view
		$this->template->build('floor_plans/list');
	}


	function create($page = NULL) 
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());

		//create control variables
		$form_data_aux 	= 	array();
		$this->template->title(lang('web_create_t', array(':name' => 'floor_plans')));
		$this->template->set('updType', 'create');
		$this->template->set('page', ( $this->uri->segment(4) )  ? $this->uri->segment(4) : $this->input->post('page', TRUE));

		//Rules for validation
		$this->set_rules();

		//validate the fields of form
		if ($this->form_validation->run() == FALSE) 
		{
			//Load view
			$this->template->build('floor_plans/create');	
		}
		else
		{
			//Validation OK!
			$array_thumbnails 	= array();
			$array_required 	= explode(",", "floor_plan");
			$this->load->library('upload');
			$this->load->library('image_lib');

			foreach ($_FILES as $index => $value)
			{
				if ($value['name'] != '')
				{
					//uploads rules for $index
					if ($index == 'floor_plan')
					{
						$this->upload->initialize($this->set_upload_options('floor_plans', 'floor_plan'));
					}

					//upload the image
					if ( ! $this->upload->do_upload($index))
					{
						//Load view
						$this->template->set('error_'.$index, $this->upload->display_errors("<span class='error'>", "</span>"));
						$this->template->build('floor_plans/create');

						return FALSE;
					}
					else
					{
						//create an array to send to image_lib library to create the thumbnail
						$info_upload = $this->upload->data();

						//Save the name an array to save on BD before
						$form_data_aux[$index]		=	$info_upload['file_name'];


						if (in_array($index, $array_thumbnails))
						{
							//Initializing the imagelib library to create the thumbnail

							//create the thumbnail
							if ( ! $this->image_lib->resize())
							{
								//Load view
								$this->template->set('error_'.$index, $this->image_lib->display_errors("<span class='error'>", "</span>"));
								$this->template->build('floor_plans/create');

								return FALSE;
							}
						}
					}
				}
				else
				{
					if (in_array($index, $array_required))
					{
						//Load view
						$this->template->set('error_'.$index, "<span class='error'>".lang('upload_no_file_selected')."</span>");
						$this->template->build('floor_plans/create');

						return FALSE;
					}
				}
			}


            $form_data = array(
                'name' => set_value('name'),
                'model' => $_POST['model'],
                'year' => $_POST['year']
            );

			$form_data = array_merge($form_data, $form_data_aux);

			$floor_plan = Floor_plan::create($form_data);

			if ( $floor_plan->is_valid() ) // the information has therefore been successfully saved in the db
			{
				$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_create_success') ));
			}
			
			if ( $floor_plan->is_invalid() )
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => $floor_plan->errors->full_messages() ));
			}

			redirect('/admin/floor_plans/');
		
	  	} 
	}


	function edit($id = FALSE, $page = 1) 
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());

		//get the $id and sanitize
		$id = ( $this->uri->segment(4) )  ? $this->uri->segment(4) : $this->input->post('id', TRUE);
		$id = ( $id != 0 ) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

		//get the $page and sanitize
		$page = ( $this->uri->segment(5) )  ? $this->uri->segment(5) : $this->input->post('page', TRUE);
		$page = ( $page != 0 ) ? filter_var($page, FILTER_VALIDATE_INT) : NULL;

		//redirect if it´s no correct
		if (!$id){
			$this->session->set_flashdata('message', array( 'type' => 'warning', 'text' => lang('web_object_not_exist') ) );
			redirect('admin/floor_plans/');
		}

		//variables for check the upload
		$form_data_aux			= array();
		$files_to_delete 		= array();
		
		//Rules for validation
		$this->set_rules($id);

		//create control variables
		$this->template->title(lang('web_edit_t', array(':name' => 'floor_plans')));
		$this->template->set('updType', 'edit');
		$this->template->set('page', $page);

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			//search the item to show in edit form
			$this->template->set('floor_plan', Floor_plan::find_by_id($id));
			
			//load the view
			$this->template->build('floor_plans/create');	
		}
		else
		{
			$array_thumbnails 	= array();
			$array_required 	= explode(",", "floor_plan");
			$data['floor_plan'] = Floor_plan::find($this->input->post('id', TRUE));
			$this->template->set('floor_plan', $data['floor_plan']);

			$this->load->library('upload');
			$this->load->library('image_lib');

			foreach ($_FILES as $index => $value)
			{
				if ($value['name'] != '')
				{

					//uploads rules for $index
					if ($index == 'floor_plan')
					{
						$this->upload->initialize($this->set_upload_options('floor_plans', 'floor_plan'));
					}

					//upload the image
					if ( ! $this->upload->do_upload($index))
					{
						//Load view
						$this->template->set('error_'.$index, $this->upload->display_errors("<span class='error'>", "</span>"));
						$this->template->build('floor_plans/create');

						return FALSE;
					}
					else
					{
						//create an array to send to image_lib library to create the thumbnail
						$info_upload = $this->upload->data();

						//Save the name an array to save on BD before
						$form_data_aux[$index]		=	$info_upload["file_name"];

						//Save the name of old files to delete
						array_push($files_to_delete, $data['floor_plan']->$index);

						//Initializing the imagelib library to create the thumbnail

						if (in_array($index, $array_thumbnails))
						{
						
							//create the thumbnail
							if ( ! $this->image_lib->resize())
							{
								//Load view
								$this->template->set('error_'.$index, $this->image_lib->display_errors("<span class='error'>", "</span>"));
								$this->template->build('floor_plans/create');

								return FALSE;
							}
						}
					}
				}

			}		
	
			// build array for the model
			$form_data = array(
					       	'id'	=> $this->input->post('id', TRUE),
							'name' => set_value('name'),
							'model' => set_value('model'),
							'year' => $_POST['year']
						);

            
			//add the aux form data to the form data array to save
			$form_data = array_merge($form_data_aux, $form_data);

			//find the item to update
			$floor_plan = Floor_plan::find($this->input->post('id', TRUE));
			$floor_plan->update_attributes($form_data);

			// run insert model to write data to db
			if ( $floor_plan->is_valid()) // the information has therefore been successfully saved in the db
			{
				
				//delete the old images
				foreach ($files_to_delete as $index)
				{
					if ( is_file(FCPATH.'public/uploads/floor_plans/files/'.$index) )	
						unlink(FCPATH.'public/uploads/floor_plans/files/'.$index);
				}

				$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_edit_success') ));
				redirect("/admin/floor_plans/".$page);
			}

			if ($floor_plan->is_invalid())
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => $floor_plan->errors->full_messages() ) );
				redirect("/admin/floor_plans/".$page);
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
			
			redirect('floor_plans');
		}
		
		//search the item to delete
		if ( Floor_plan::exists($id) )
		{
			$floor_plan = Floor_plan::find($id);
		}
		else
		{
			$this->session->set_flashdata('message', array( 'type' => 'warning', 'text' => lang('web_object_not_exist') ) );
			
			redirect('floor_plans');		
		}

		//Save the files into array to delete after
		array_push($files_to_delete, $floor_plan->floor_plan);

		//delete the item
		if ( $floor_plan->delete() == TRUE) 
		{
			$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_delete_success') ));		

			//delete the old images
			foreach ($files_to_delete as $index)
			{
				if ( is_file(FCPATH.'public/uploads/floor_plans/files/'.$index) )	
					unlink(FCPATH.'public/uploads/floor_plans/files/'.$index);
			}

		}
		else
		{
			$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => lang('web_delete_failed') ) );
		}	

		redirect("/admin/floor_plans/");
	}


	private function set_rules($id = NULL)
	{

		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|min_length[0]|max_length[60]');
		$this->form_validation->set_rules('model', 'model', 'trim|xss_clean|min_length[0]|max_length[60]');
		$this->form_validation->set_rules('year', 'year', 'trim|xss_clean|min_length[4]|max_length[4]');
		$this->form_validation->set_error_delimiters("<br /><span class='error'>", '</span>');
	}		

	
	private function set_paginate_options()
	{
		$config = array();

		$config['base_url'] = site_url() . 'admin/floor_plans';

		$config['use_page_numbers'] = TRUE;

	    $config['per_page'] = 10;

		$config['total_rows'] = Floor_plan::count();

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

		
	private function set_upload_options($controller, $field)
	{	
		//upload an image options
		$config = array();

		if ($field == 'floor_plan')
		{
			$config['upload_path'] 		= FCPATH.'public/uploads/'.$controller.'/files/';
			$config['allowed_types'] 	= 'pdf|doc|docx|zip|jpg|png|jpeg|gif';
			$config['max_size'] 		= '32768';
			$config['encrypt_name']  = FALSE;
            $config['file_name']     = md5(microtime());
		}


		//create controller upload folder if not exists
		if (!is_dir($config['upload_path']))
		{
			mkdir(FCPATH."public/uploads/$controller/");
			mkdir(FCPATH."public/uploads/$controller/files/");
			mkdir(FCPATH."public/uploads/$controller/img/");
			mkdir(FCPATH."public/uploads/$controller/img/thumbs/");
		}
			
		return $config;
	}
	

}