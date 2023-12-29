<?php
define('TMP_DIR', FCPATH . 'public' . DIRECTORY_SEPARATOR . 'tmp');
if(!is_dir(TMP_DIR)){
	mkdir(TMP_DIR);
}
ini_set('upload_tmp_dir', TMP_DIR);
define('EMAIL_UPLOADS_DIR', FCPATH . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'email');

class Forms extends MY_Controller
{
	public $show_banner = false;

	private $subject;

	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('frontend');
	}


	public function index()
	{
		$this->template->build('index/index');
	}

  public function offerform()
	{
    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

  	if($id){
          $vehicle = Vehicle::find_by_id($id);
          $this->template->set('vehicle', $vehicle);
      }

  	$this->template->set('title', "Internet Offer Form");

		$this->template->build('forms/offerform');
	}

	public function bidform()
	{
	    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

        if($id){
            $vehicle = Vehicle::find_by_id($id);
            $this->template->set('vehicle', $vehicle);
        }

    	$this->template->set('title', "Bid Form Offer");


		$this->template->build('forms/bidform');
	}

	public function rvwanted()
	{
	    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

        if($id){
            $vehicle = Vehicle::find_by_id($id);
            $this->template->set('vehicle', $vehicle);
        }

    	$this->template->set('title', "RV Wanted Request Form");


		$this->template->build('forms/rvwanted');
	}

	public function service_appointment()
	{
	    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

        if($id){
            $vehicle = Vehicle::find_by_id($id);
            $this->template->set('vehicle', $vehicle);
        }

    	$this->template->set('title', "RV Service Appointment Request");


		$this->template->build('forms/service_appointment');
	}

	public function sell_your_rv()
	{
	    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

        if($id){
            $vehicle = Vehicle::find_by_id($id);
            $this->template->set('vehicle', $vehicle);
        }

    	$this->template->set('title', "Sell Your RV Form");


		$this->template->build('forms/sell_your_rv');
	}

	public function specialparts()
	{
    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

    if($id){
        $vehicle = Vehicle::find_by_id($id);
        $this->template->set('vehicle', $vehicle);
    }

  	$this->template->set('title', "Special Parts Request Form");


		$this->template->build('forms/specialparts');
	}

	public function extended_service()
	{
    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

    if($id){
        $vehicle = Vehicle::find_by_id($id);
        $this->template->set('vehicle', $vehicle);
    }

  	$this->template->set('title', "Special Parts Request Form");


		$this->template->build('forms/extended_service');
	}

	public function insurance_quote()
	{
    $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

    if($id){
        $vehicle = Vehicle::find_by_id($id);
        $this->template->set('vehicle', $vehicle);
    }

  	$this->template->set('title', "Special Parts Request Form");


		$this->template->build('forms/insurance_quote');
	}

	public function form_success(){
		$this->template->set('title', "Form Success");

		$this->template->build('forms/form_success');
	}

	public function send_email(){
		$config = array(
			'useragent'	=> 'DeMartiniRV Sales',
			'protocol'	=> 'smtp',
			'smtp_host' => '192.168.16.55',
			'smtp_user' => 'webmaster',
			'smtp_pass' => 'Demartiniweb12',
			'smtp_port' => ENVIRONMENT === 'development' ? 587 : 25,
			'mailtype' 	=> 'html',
			'wordwrap' 	=> FALSE,
			'crlf' 		  => "\r\n",
			'newline' 	=> "\r\n"
		);


		$this->load->library('email');

		$this->email->initialize($config);

		$this->email->reply_to($this->get_reply_to(), $this->get_reply_to_name());

		$this->load_data();
		$this->create_msg();

		$this->send();
	}

	private function get_reply_to(){
		if(!empty($_REQUEST['email'])){
			$email = $_REQUEST['email'];
		}else if(!empty($_REQUEST['UserEmail'])){
			$email = $_REQUEST['UserEmail'];
		}else if(!empty($_REQUEST['Email'])){
			$email = $_REQUEST['Email'];
		}else{
			$email = false;
		}
		return $email;
	}

	private function get_reply_to_name(){
		if(!empty($_REQUEST['Name'])){
			$name = $_REQUEST['Name'];
		}else if(!empty( $_POST['first_name'])){
			$name = $_POST['first_name'] . ' ' . $_POST['last_name'];
		}else{
			$name = '';
		}

		return $name;
	}

	private function check_for_spam(){
		if(isset($_POST['Phone']) && $_POST['Phone'] == '123456'){
			die('Sorry you have been flagged as spam.');
		}
		
		$current_token = md5(date('m.d.y'));
		
		if (!isset($_POST['xx_token']) || $_POST['xx_token'] != $current_token) {
			die('Sorry you have been flagged as spam.');
		}
	}
	private function load_data(){
		$address = array();
		if(isset($_POST['xx_to'])){
			if(is_array($_POST['xx_to'])){
				foreach($_POST['xx_to'] as $to){
					$address[] = $to;
				}
			}else{
				$address[] = $_POST['xx_to'];
			}
		}
		$this->email->to(implode(',', $address));
		//$this->email->to('peterdemartini@me.com');
		$ccs = array();
		if(isset($_POST['xx_cc'])){
			if(is_array($_POST['xx_cc'])){
				foreach($_POST['xx_cc'] as $cc){
					$ccs[] = $cc;
				}
			}else{
				$ccs[] = $_POST['xx_cc'];
			}
		}
		$this->email->cc(implode(',', $ccs));
		if(isset($_POST['xx_from'])){
			$this->email->from($_POST['xx_from']);
		}else{
			$this->email->from('webmaster@demartini.com');
		}

		if(isset($_POST['xx_subject'])){
			$this->email->subject($_POST['xx_subject']);
			$this->subject = $_POST['xx_subject'];
		}else{
			$this->email->subject('Gerneric Form - Could be spam');
			$this->subject = 'Gerneric Form - Could be spam';
		}
		$count = 0;
		if(isset($_FILES['uploads']['name'])){
			if(!is_dir(EMAIL_UPLOADS_DIR)){
				mkdir(EMAIL_UPLOADS_DIR);
			}
			foreach ($_FILES['uploads']['name'] as $filename){
				 $target = EMAIL_UPLOADS_DIR . DIRECTORY_SEPARATOR . basename( $filename );
				 $tmp = $_FILES['uploads']['tmp_name'][$count];
				 if(move_uploaded_file($tmp, $target)){
				 	//do nothing
				 }else {
				 	$reponse = "Sorry, there was a problem uploading your file.";
				 }
				$this->email->attach($target);
				$count++;
			}
		}
	}

	private function setReplyTo($from, $from_name){
		if($from !== false){
			$this->email->reply_to($from, $from_name);
		}
	}

	private function send(){
		//Send email
		$sent = $this->email->send();
		if($sent){
			//$referrer = $_SERVER['HTTP_REFERER'];
			redirect('forms/form_success');
			//echo "Success :: " . $referrer;
		}else{
			echo 'There has been an error processing your request.
			<br> Contact <a href="mailto:sales@demartini.com">sales@demartini.com</a> to report the issue.<br>';
			if(ENVIRONMENT === 'development'){
				echo $this->email->print_debugger();
			}
		}
	}

	private function create_msg(){
		$msg = $this->subject . ": <br /><br /><ul>";
		$post = $_POST;

		if(!empty($post['rv'])){
			$RV = $post['rv'];
			unset($post['rv']);
			$msg .= "<li><b>RV:</b> " . $RV . " </li>";
		}

		foreach($post as $key => $val){
			if($key == 'submit'
				|| $key == 'MAX_FILE_SIZE'
				|| $key == 'VTI-GROUP'){
				continue;
			}
			if(stripos($key, 'xx_') !== false){
				continue;
			}
			if(is_string($val)){
				$msg .= "<li><b>" . $this->make_readable($key) . ":</b> " . $val . " </li>";
			}
		}
		$msg .= "</ul><br /><br /> The end of the message.";
		$this->email->message($msg);
	}


	private function make_readable($string){
		$string = str_ireplace('_', ' ', $string);
		$string = ucwords($string);
		return $string;
	}
}
