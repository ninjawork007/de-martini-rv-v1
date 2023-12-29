<?php

class Testimonials extends MY_Controller
{
	public $show_banner = false;

	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('frontend');

	}


	public function index()
	{
		$this->template->set('title', 'Testimonials');

		$config = $this->set_paginate_options();
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$this->template->set('links', $this->pagination->create_links());

        $testimonials = Testimonial::paginate_all($config['per_page'], $page);
   		$this->template->set('testimonials', $testimonials);
		$this->template->build('testimonials/listview.php');
	}


	private function set_paginate_options($seg = '3')
	{
		$config = array();

		$config['base_url'] = site_url() . '/testimonials/index';

		$config['use_page_numbers'] = TRUE;

		$config['per_page'] = 7;

		$config['total_rows'] = Testimonial::count();

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
