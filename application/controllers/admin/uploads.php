<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends MY_Controller
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
		$this->template->title(lang('web_list_of', array(':name' => 'uploads')));

		//set the pagination configuration array and initialize the pagination
		$config = $this->set_paginate_options();

		//Initialize the pagination class
		$this->pagination->initialize($config);

		//control of number page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		//find all the categories with paginate and save it in array to past to the view
		$this->template->set('uploads', Upload::paginate_all($config['per_page'], $page));

		//create paginate´s links
		$this->template->set('links', $this->pagination->create_links());

		//control variables
		$this->template->set('page', $page);

		//Load view
		$this->template->build('uploads/list');
	}


	function create($page = NULL) 
	{
		//load block submit helper and append in the head
		$this->template->append_metadata(block_submit_button());

		//create control variables
		$form_data_aux 	= 	array();
		$this->template->title(lang('web_create_t', array(':name' => 'uploads')));
		$this->template->set('updType', 'create');
		$this->template->set('page', ( $this->uri->segment(4) )  ? $this->uri->segment(4) : $this->input->post('page', TRUE));

		//Rules for validation
		$this->set_rules();

		//validate the fields of form
		if ($this->form_validation->run() == FALSE) 
		{
			$this->return_json(false, 0, "Failed Validation", 'error');	
		}
		else
		{
			//Validation OK!
			$array_thumbnails 	= array();
			$array_required 	= explode(",", "file");
			$this->load->library('upload');
			$this->load->library('image_lib');

			foreach ($_FILES as $index => $value)
			{
				if ($value['name'] != '')
				{
					//uploads rules for $index
					if ($index == 'file')
					{
						$this->upload->initialize($this->set_upload_options('uploads', 'file'));
					}

					//upload the image
					if ( ! $this->upload->do_upload($index))
					{
						//Load view
                        $this->return_json(false, 0, $this->upload->display_errors(), 'error');
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
                                $this->return_json(false, 0, $this->image_lib->display_errors(), 'error');
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
						$this->return_json(false, 0, lang('upload_no_file_selected'), 'error');

						return FALSE;
					}
				}
			}


			$form_data = array(
				'name' => set_value('name'), 
				'description' => set_value('description')
			);


			$form_data = array_merge($form_data, $form_data_aux);

			$upload = Upload::create($form_data);
			
			if($this->input->post('vehicle_id')){
    			Vehicleuploads::create(array(
    				'upload_id' => $upload->id,
    				'vehicle_id' => $this->input->post('vehicle_id')
    			));
			}

			if ( $upload->is_valid() ) // the information has therefore been successfully saved in the db
			{
				$this->return_json(true, $upload->id, lang('web_create_success'), 'new');
			}
			
			if ( $upload->is_invalid() )
			{
				$this->return_json(false, 0, $upload->errors->full_messages(), 'error');
			}

			redirect('/admin/uploads/');
		
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
			$this->return_json(false, 0, lang('web_object_not_exist') . " $id", 'error');
			redirect('admin/uploads/');
		}

		//variables for check the upload
		$form_data_aux			= array();
		$files_to_delete 		= array();
		
		//Rules for validation
		$this->set_rules($id);

		//create control variables
		$this->template->title(lang('web_edit_t', array(':name' => 'uploads')));
		$this->template->set('updType', 'edit');
		$this->template->set('page', $page);

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			//search the item to show in edit form
			$this->template->set('upload', Upload::find_by_id($id));
			
			$this->return_json(false, 0, "Failed Validation", 'error');	
		}
		else
		{
			$array_thumbnails 	= array();
			$array_required 	= explode(",", "file");
			$data['upload'] = Upload::find($id);
			
			$this->template->set('upload', $data['upload']);

			$this->load->library('upload');
			$this->load->library('image_lib');

			foreach ($_FILES as $index => $value)
			{
				if ($value['name'] != '')
				{

					//uploads rules for $index
					if ($index == 'file')
					{
						$this->upload->initialize($this->set_upload_options('uploads', 'file'));
					}

					//upload the image
					if ( ! $this->upload->do_upload($index))
					{
						//Load view
						$this->return_json(false, 0, $this->upload->display_errors(), 'error');

						return FALSE;
					}
					else
					{
						//create an array to send to image_lib library to create the thumbnail
						$info_upload = $this->upload->data();

						//Save the name an array to save on BD before
						$form_data_aux[$index]		=	$info_upload["file_name"];

						//Save the name of old files to delete
						array_push($files_to_delete, $data['upload']->$index);

						//Initializing the imagelib library to create the thumbnail

						if (in_array($index, $array_thumbnails))
						{
						
							//create the thumbnail
							if ( ! $this->image_lib->resize())
							{
								//Load view
								$this->return_json(false, 0, $this->image_lib->display_errors(), 'error');

								return FALSE;
							}
						}
					}
				}

			}		
	
			// build array for the model
			$form_data = array(
					       	'id'	=> $id,
							'name' => set_value('name'), 
							'description' => set_value('description')
						);

			//add the aux form data to the form data array to save
			$form_data = array_merge($form_data_aux, $form_data);
		
			//find the item to update
			$upload = Upload::find($id);
			$upload->update_attributes($form_data);

			// run insert model to write data to db
			if ( $upload->is_valid()) // the information has therefore been successfully saved in the db
			{
				//delete the old images
				foreach ($files_to_delete as $index)
				{
					if ( is_file(FCPATH.'public/uploads/uploads/files/'.$index) )	
						unlink(FCPATH.'public/uploads/uploads/files/'.$index);
				}

				$this->return_json(true, $upload->id, lang('web_edit_success'), 'edit');
				redirect("/admin/uploads/".$page);
			}

			if ($upload->is_invalid())
			{
				$this->return_json(false, 0, $upload->errors->full_messages(), 'error');
				redirect("/admin/uploads/".$page);
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
			$this->return_json(false, 0, lang('web_object_not_exist'), 'error');
			
			redirect('uploads');
		}
		
		//search the item to delete
		if ( Upload::exists($id) )
		{
			$upload = Upload::find($id);
		}
		else
		{
			$this->return_json(false, 0, lang('web_object_not_exist'), 'error');
			
			redirect('uploads');		
		}

		//Save the files into array to delete after
		array_push($files_to_delete, $upload->file);

		//delete the item
		if ( $upload->delete() == TRUE) 
		{
            
			//delete the old images
			foreach ($files_to_delete as $index)
			{
				if ( is_file(FCPATH.'public/uploads/uploads/files/'.$index) )	
					unlink(FCPATH.'public/uploads/uploads/files/'.$index);
			}
            
		}
		else
		{
			$this->return_json(false, 0, lang('web_delete_failed'), 'error');
		}	
        $this->return_json(true, 0, lang('web_delete_success'), 'delete');
		redirect("/admin/uploads/");
	}


	private function set_rules($id = NULL)
	{
		//Creamos los parametros de la funcion del constructor.
		// More validations: http://codeigniter.com/user_guide/libraries/form_validation.html

		$this->form_validation->set_rules('name', 'name', 'required|trim|xss_clean|min_length[0]|max_length[255]');

		$this->form_validation->set_rules('description', 'description', 'trim|min_length[0]|max_length[500]');
		$this->form_validation->set_error_delimiters("<br /><span class='error'>", '</span>');
	}		

	
	private function set_paginate_options()
	{
		$config = array();

		$config['base_url'] = site_url() . 'admin/uploads';

		$config['use_page_numbers'] = TRUE;

	    $config['per_page'] = 10;

		$config['total_rows'] = Upload::count();

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

		if ($field == 'file')
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
	
	private function return_json($success=true, $id=0, $msg='', $type = false){
        $upload = false;
        if(!empty($id)) $upload = Upload::find_by_id($id);
        echo json_encode(array(
            'success' => $success, 
            'id' => $id, 
            'msg' => $msg, 
            'new_upload_row' => $this->load->view('uploads/upload_row', array('upload' => $upload, 'type' => $type), true)));
        die();
    }
	

}