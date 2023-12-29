<?php

class Index extends MY_Controller
{
	public $show_banner = true;

	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('frontend');
	}


	public function index()
	{
		$this->template->build('index/index');
	}

    public function service()
	{
        $this->show_banner = false;
	    $this->template->set('title', "Service Page");
		$this->template->build('details/service');
	}
	
	public function partsform()
	{
        $this->show_banner = false;
	    $this->template->set('title', "Parts Form");
		$this->template->build('details/partsform');
	}
	
	public function parts_service()
	{
        $this->show_banner = false;
	    $this->template->set('title', "Parts and Service");
		$this->template->build('details/parts_service');
	}

    public function location()
	{
        $this->show_banner = false;
	    $this->template->set('title', "Contact Location");
		$this->template->build('details/location');
	}

    public function credit()
	{
        $this->show_banner = false;
	    $this->template->set('title', "Credit");
		$this->template->build('details/credit');
	}

	public function salesmap()
	{
        $this->show_banner = false;
	    $this->template->set('title', "Sales Map");
		$this->template->build('details/salesmap');
	}
	
	public function covid19()
	{
        $this->show_banner = false;
	    $this->template->set('title', "Covid19");
		$this->template->build('details/covid19');
	}

	public function contact($result = NULL)
	{
        $this->show_banner = false;
		$this->template->title(lang('web_contact'));

		$this->_set_rules();

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->build('index/contact');
		}
		else
		{
			$form_data = array(
		       	'name' 		=> $this->input->post('name', TRUE ), 
		       	'lastname' 	=> $this->input->post('lastname', TRUE ), 
		       	'email' 	=> $this->input->post('email', TRUE ), 
		       	'phone' 	=> $this->input->post('phone', TRUE ), 
		       	'comments'	=> $this->input->post('comments', TRUE)
			);

			$this->load->library('email');

			$this->email->from('sangar1982@gmail.com', 'Contacto Codeigniter');
			$this->email->to('sangar1982@gmail.com');

			$this->email->subject('Formulario de Contacto Codeigniter');

			$message = $this->load->view('index/email/formcontact.tpl.php', $form_data, TRUE);

			$this->email->message($message);

			if ( $this->email->send() )
			{
				$this->session->set_flashdata('message', array( 'type' => 'success', 'text' => lang('web_mail_ok') ));
				redirect('contact');
			}
			else
			{
				$this->session->set_flashdata('message', array( 'type' => 'error', 'text' => lang('web_mail_ko') ) );
				redirect('contact');				
			}
		}
	}


	 /**
     * Set rules for form
     * @return void
     */
	private function _set_rules()
	{
		//validate form input
		$this->form_validation->set_rules('name', 'lang:web_name', 'required|trim|xss_clean|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('lastname', 'lang:web_lastname', 'required|trim|xss_clean|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('email', 'lang:web_email', 'required|trim|valid_email|xss_clean');
		$this->form_validation->set_rules('phone', 'lang:web_phone', 'required|trim|numeric|xss_clean');
		$this->form_validation->set_rules('comments', 'lang:web_comments', 'required|trim|xss_clean');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	}

}
