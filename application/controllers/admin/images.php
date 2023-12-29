<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Images extends MY_Controller
{
    protected $before_filter = array('action' => 'is_logged_in'
        //'except' => array(),

        //'only' => array()
    );

    function __construct()
    {
        parent::__construct();

        $this->template->set_layout('iframe');


    }


    public function index()
    {
        //set the title of the page
        $this->template->title(lang('web_list_of', array(
                    ':name' => 'images'
                )));

        //set the pagination configuration array and initialize the pagination
        $config = $this->set_paginate_options();

        //Initialize the pagination class
        $this->pagination->initialize($config);

        //control of number page
        $page       = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        //get the $vehicle_id and sanitize
        $vehicle_id = ($this->uri->segment(4) ? $this->uri->segment(4) : $this->input->post('vehicle_id', TRUE));
        $vehicle_id = ($vehicle_id != 0) ? filter_var($vehicle_id, FILTER_VALIDATE_INT) : NULL;
        
        $veh = Vehicle::find_by_id($vehicle_id);

        $this->template->set('vehicle_id', $vehicle_id);
        //find all the categories with paginate and save it in array to past to the view
        $this->template->set('images', $veh->images);

        //create paginate´s links
        $this->template->set('links', $this->pagination->create_links());

        //control variables
        $this->template->set('page', $page);

        //Load view
        $this->template->build('images/list');
    }


    function create($page = NULL)
    {
        //load block submit helper and append in the head
        $this->template->append_metadata(block_submit_button());

        //create control variables
        $this->template->title(lang('web_create_t', array(
                    ':name' => 'images'
                )));
        $this->template->set('updType', 'create');

        //Select 1:N data
        $this->template->set('array_group', group::find('all', array(
                    'order' => 'name ASC'
                )));
        $this->template->set('page', ($this->uri->segment(4)) ? $this->uri->segment(4) : $this->input->post('page', TRUE));


        //get the $vehicle_id and sanitize
        $vehicle_id = ($this->uri->segment(5) ? $this->uri->segment(5) : $this->input->post('vehicle_id', TRUE));
        $vehicle_id = ($vehicle_id != 0) ? filter_var($vehicle_id, FILTER_VALIDATE_INT) : NULL;
        
        
        $this->template->set('vehicle_id', $vehicle_id);

        //Rules for validation
        $this->set_rules();

        //validate the fields of form
        if ($this->form_validation->run() == FALSE) {
            //Load view
            $this->template->build('images/create');
        } else {
            //Validation OK!
            $array_thumbnails = explode(",", "image");
            $array_required   = explode(",", "image");
            $this->load->library('upload');
            $this->load->library('image_lib');
            $position = (int)set_value('position');
            $is_front = (int)set_value('is_front');
            
            $field = 'image';
            $files = array();
            foreach( $_FILES[$field] as $key => $all )
                foreach( $all as $i => $val )
                    $files[$i][$key] = $val;
                    
            $files_uploaded = array();
            for ($i=0; $i < count($files); $i++) { 
                $_FILES[$field] = $files[$i];
                //uploads rules for $index
                if ($field == 'image') {
                    $this->upload->initialize($this->set_upload_options('images', 'image'));
                }
                if (!$this->upload->do_upload($field)) {
                    //Load view
                    $this->template->set('error_' . $field, $this->upload->display_errors("<span class='error'>", "</span>"));
                    $this->template->build('images/create');

                    return FALSE;
                } else {
                    //create an array to send to image_lib library to create the thumbnail
                    $info_upload = $this->upload->data();
                    
                    $form_data_aux   = array();

                    //Save the name an array to save on BD before
                    $form_data_aux[$field] = $info_upload['file_name'];


                    if (in_array($field, $array_thumbnails)) {
                        //Initializing the imagelib library to create the thumbnail

                        //thumbnails rules for $index
                        if ($field == 'image') {
                            $this->image_lib->initialize($this->set_thumbnail_options($info_upload, 'images', 'image'));
                        }

                        //create the thumbnail
                        if (!$this->image_lib->resize()) {
                            //Load view
                            $this->template->set('error_' . $field, $this->image_lib->display_errors("<span class='error'>", "</span>"));
                            $this->template->build('images/create');

                            return FALSE;
                        }
                    }
                    
                    $form_data = array(
                        'title' => set_value('title'),
                        'is_front' => $is_front,
                        'position' => $position,
                        'description' => set_value('description'),
                        'public' => set_value('public'),
                        'group_id' => set_value('group_id')
                    );
                    
                    if(empty($form_data['group_id'])) $form_data['group_id'] = '1';
        
                    $form_data = array_merge($form_data, $form_data_aux);
                    
                    unset($form_data['id']);
                    
                    $image = Image::create($form_data);
                                        
                    if (isset($vehicle_id) && !empty($image->id)) {
                        Vehicleimages::create(array(
                            'image_id' => $image->id,
                            'vehicle_id' => $vehicle_id
                        ));
                    }
                    
                    if($image->is_invalid()){
                        $this->session->set_flashdata('message', array(
                            'type' => 'error',
                            'text' => $image->errors->full_messages()
                        ));
                        redirect('/admin/images/index/' . $vehicle_id . '/' . $page);
                    }
                    if($image->is_valid()){
                        $position++;
                        if($is_front){
                            $is_front = 0;
                        }
                    }
                }
            }
            
            $this->session->set_flashdata('message', array(
                'type' => 'success',
                'text' => lang('web_create_success')
            ));
            redirect('/admin/images/index/' . $vehicle_id . '/' . $page);

        }
    }


    function edit($id = FALSE, $page = 1)
    {
        //load block submit helper and append in the head
        $this->template->append_metadata(block_submit_button());

        //get the $id and sanitize
        $id = ($this->uri->segment(4)) ? $this->uri->segment(4) : $this->input->post('id', TRUE);
        $id = ($id != 0) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

        //get the $page and sanitize
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : $this->input->post('page', TRUE);
        $page = ($page != 0) ? filter_var($page, FILTER_VALIDATE_INT) : NULL;

        //get the $vehicle_id and sanitize
        $vehicle_id = ($this->uri->segment(6) ? $this->uri->segment(6) : $this->input->post('vehicle_id', TRUE));
        $vehicle_id = ($vehicle_id != 0) ? filter_var($vehicle_id, FILTER_VALIDATE_INT) : NULL;
        $this->template->set('vehicle_id', $vehicle_id);

        //redirect if it´s no correct
        if (!$id) {
            $this->session->set_flashdata('message', array(
                    'type' => 'warning',
                    'text' => lang('web_object_not_exist')
                ));
            redirect('/admin/images/index/' . $vehicle_id . '/' . $page);
        }

        //Select 1:N data
        $this->template->set('array_group', group::find('all', array(
                    'order' => 'name ASC'
                )));


        //Rules for validation
        $this->set_rules($id);

        //create control variables
        $this->template->title(lang('web_edit_t', array(
                    ':name' => 'images'
                )));
        $this->template->set('updType', 'edit');
        $this->template->set('page', $page);

        //search the item to show in edit form
        $this->template->set('image', Image::find_by_id($id));

        //load the view
        $this->template->build('images/create');
        //redirect if it´s no correct
        if (!$id) {
            $this->session->set_flashdata('message', array(
                    'type' => 'warning',
                    'text' => lang('web_object_not_exist')
                ));
            redirect('/admin/images/' . $vehicle_id . '/' . $page);
        }

        //Select 1:N data
        $this->template->set('array_group', group::find('all', array(
                    'order' => 'name ASC'
                )));


        //Rules for validation
        $this->set_rules($id);

        //create control variables
        $this->template->title(lang('web_edit_t', array(
                    ':name' => 'images'
                )));
        $this->template->set('updType', 'edit');
        $this->template->set('page', $page);

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
            //search the item to show in edit form
            $this->template->set('image', Image::find_by_id($id));

            //load the view
            $this->template->build('images/create');
        } else {
            $array_thumbnails = explode(",", "image");
            $array_required   = explode(",", "image");
            $data['image']    = Image::find($this->input->post('id', TRUE));
            $this->template->set('image', $data['image']);
            $this->load->library('upload');
            $this->load->library('image_lib');
            $field = 'image';
            $files = array();
            foreach( $_FILES[$field] as $key => $all )
                if(!empty($val['name']))
                    foreach( $all as $i => $val )
                        $files[$i][$key] = $val;
                    
            $files_uploaded = array();
            for ($i=0; $i < count($files); $i++) { 
                $_FILES[$field] = $files[$i];
                //uploads rules for $index
                if ($field == 'image') {
                    $this->upload->initialize($this->set_upload_options('images', 'image'));
                }
                if (!$this->upload->do_upload($field)) {
                    //Load view
                    $this->template->set('error_' . $field, $this->upload->display_errors("<span class='error'>", "</span>"));
                    $this->template->build('images/create');

                    return FALSE;
                } else {
                    //variables for check the upload
                    $form_data_aux   = array();
                    //create an array to send to image_lib library to create the thumbnail
                    $info_upload = $this->upload->data();
                    
                    

                    //Save the name an array to save on BD before
                    $form_data_aux[$field] = $info_upload['file_name'];


                    if (in_array($field, $array_thumbnails)) {
                        //Initializing the imagelib library to create the thumbnail

                        //thumbnails rules for $index
                        if ($field == 'image') {
                            $this->image_lib->initialize($this->set_thumbnail_options($info_upload, 'images', 'image'));
                        }

                        //create the thumbnail
                        if (!$this->image_lib->resize()) {
                            //Load view
                            $this->template->set('error_' . $field, $this->image_lib->display_errors("<span class='error'>", "</span>"));
                            $this->template->build('images/create');

                            return FALSE;
                        }
                    }
                    
                    $form_data = array(
                        'title' => set_value('title'),
                        'is_front' => $is_front,
                        'position' => $position,
                        'description' => set_value('description'),
                        'public' => set_value('public'),
                        'group_id' => set_value('group_id')
                    );
                    
                    if(empty($form_data['group_id'])) $form_data['group_id'] = '1';
        
                    $form_data = array_merge($form_data, $form_data_aux);
                    
                    unset($form_data['id']);
                    
                    $image = Image::create($form_data);
                    
                    if (isset($vehicle_id) && !empty($image->id)) {
                        Vehicleimages::create(array(
                            'image_id' => $image->id,
                            'vehicle_id' => $vehicle_id
                        ));
                    }
                    
                    if($image->is_invalid()){
                        $this->session->set_flashdata('message', array(
                            'type' => 'error',
                            'text' => $image->errors->full_messages()
                        ));
                        redirect('/admin/images/index/' . $vehicle_id . '/' . $page);
                    }
                    if($image->is_valid()){
                        $position++;
                        if($is_front){
                            $is_front = 0;
                        }
                    }
                }
            }

            // build array for the model
            $form_data = array(
                'id' => $this->input->post('id', TRUE),
                'title' => set_value('title'),
                'is_front' => set_value('is_front'),
                'position' => set_value('position'),
                'description' => set_value('description'),
                'public' => set_value('public'),
                'group_id' => set_value('group_id')
            );

            //find the item to update
            $image = Image::find($this->input->post('id', TRUE));
            
            $image->update_attributes($form_data);

            // run insert model to write data to db
            if ($image->is_valid()){

                //delete the old images
                foreach ($files_to_delete as $index) {
                    if (is_file(FCPATH . 'public/uploads/images/img/' . $index))
                        unlink(FCPATH . 'public/uploads/images/img/' . $index);

                    if (is_file(FCPATH . 'public/uploads/images/img/thumbs/' . $index))
                        unlink(FCPATH . 'public/uploads/images/img/thumbs/' . $index);
                }

                $this->session->set_flashdata('message', array(
                        'type' => 'success',
                        'text' => lang('web_edit_success')
                    ));
                redirect("/admin/images/index/" . $vehicle_id . "/" . $page);
            }

            if ($image->is_invalid()) {
                $this->session->set_flashdata('message', array(
                        'type' => 'error',
                        'text' => $image->errors->full_messages()
                    ));
                redirect("/admin/images/index/" . $vehicle_id . "/" . $page);
            }
        }
    }



    public function delete($id = NULL, $page = 1, $vehicle_id = 1)
    {
        $files_to_delete = array();

        //filter & Sanitize $id
        $id = ($id != 0) ? filter_var($id, FILTER_VALIDATE_INT) : NULL;

        //get the $page and sanitize
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : $this->input->post('page', TRUE);
        $page = ($page != 0) ? filter_var($page, FILTER_VALIDATE_INT) : NULL;

        //get the $vehicle_id and sanitize
        $vehicle_id = ($this->uri->segment(6) ? $this->uri->segment(6) : $this->input->post('vehicle_id', TRUE));
        $vehicle_id = ($vehicle_id != 0) ? filter_var($vehicle_id, FILTER_VALIDATE_INT) : NULL;

        //redirect if it´s no correct
        if (!$id) {
            $this->session->set_flashdata('message', array(
                    'type' => 'warning',
                    'text' => lang('web_object_not_exist')
                ));

            redirect("/admin/images/index/".$vehicle_id. "/" .$page);
        }

        //search the item to delete
        if (Image::exists($id)) {
            $image = Image::find($id);
        } else {
            $this->session->set_flashdata('message', array(
                    'type' => 'warning',
                    'text' => lang('web_object_not_exist')
                ));

            redirect('/admin/images/index/' . $vehicle_id . '/' . $page);
        }

        //Save the files into array to delete after
        array_push($files_to_delete, $image->image);
        
        Vehicleimages::table()->delete(array(
            'image_id' => $image->id,
            'vehicle_id' => $vehicle_id
        ));

        //delete the item
        if ($image->delete() == TRUE) {
            $this->session->set_flashdata('message', array(
                    'type' => 'success',
                    'text' => lang('web_delete_success')
                ));

            //delete the old images
            foreach ($files_to_delete as $index) {
                if (is_file(FCPATH . 'public/uploads/images/img/' . $index))
                    unlink(FCPATH . 'public/uploads/images/img/' . $index);

                if (is_file(FCPATH . 'public/uploads/images/img/thumbs/' . $index))
                    unlink(FCPATH . 'public/uploads/images/img/thumbs/' . $index);
            }

        } else {
            $this->session->set_flashdata('message', array(
                    'type' => 'error',
                    'text' => lang('web_delete_failed')
                ));
        }

        redirect('/admin/images/index/' . $vehicle_id . '/' . $page);
    }

    private function set_rules($id = NULL)
    {
        //Creamos los parametros de la funcion del constructor.
        // More validations: http://codeigniter.com/user_guide/libraries/form_validation.html

        $this->form_validation->set_rules('title', 'title', 'required|trim|xss_clean|min_length[0]|max_length[60]');

        $this->form_validation->set_rules('is_front', 'is_front', 'xss_clean');

        $this->form_validation->set_rules('position', 'position', 'trim|xss_clean|min_length[0]|max_length[4]');

        $this->form_validation->set_rules('description', 'description', 'trim|min_length[0]|max_length[500]');

        $this->form_validation->set_rules('public', 'public', 'xss_clean');

        $this->form_validation->set_rules('group_id', 'group_id', 'xss_clean');
        $this->form_validation->set_error_delimiters("<br /><span class='error'>", '</span>');
    }


    private function set_paginate_options()
    {
        $config = array();
        
        $vehicle_id = ($this->uri->segment(4) ? $this->uri->segment(4) : $this->input->post('vehicle_id', TRUE));
        $vehicle_id = ($vehicle_id != 0) ? filter_var($vehicle_id, FILTER_VALIDATE_INT) : NULL;

        $config['base_url'] = site_url() . 'admin/images/index/' . $vehicle_id;

        $config['use_page_numbers'] = TRUE;

        $config['per_page'] = 30;

        $config['total_rows'] = Image::count_all($vehicle_id);

        $config['uri_segment'] = 5;

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

        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = round($choice);

        return $config;
    }


    private function set_upload_options($controller, $field)
    {
        //upload an image options
        $config = array();

        if ($field == 'image') {
            $config['upload_path']   = FCPATH . 'public/uploads/' . $controller . '/img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']  = FALSE;
            $config['file_name']     = md5(microtime());
            $config['max_size']      = '32000';
        }


        //create controller upload folder if not exists
        if (!is_dir($config['upload_path'])) {
            mkdir(FCPATH . "public/uploads/$controller/");
            mkdir(FCPATH . "public/uploads/$controller/files/");
            mkdir(FCPATH . "public/uploads/$controller/img/");
            mkdir(FCPATH . "public/uploads/$controller/img/thumbs/");
        }

        return $config;
    }


    private function set_thumbnail_options($info_upload, $controller, $field)
    {
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


}
