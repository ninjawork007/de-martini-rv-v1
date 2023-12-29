<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Set Configuration For Uploads
ini_set('display_errors', '1');
ini_set('smtp_port', 587);
ini_set('upload_tmp_dir', FCPATH . 'public' . DIRECTORY_SEPARATOR . 'tmp');

class Generic_Email {
	var $mail;

	public function __construct(){
		require_once FCPATH . 'vendor' . DIRECTORY_SEPARATOR . 'class.phpmailer.php';
		$this->mail = new PHPMailer();
		$this->mail->IsSMTP();
		//$this->mail->SMTPAuth = true; // turn on SMTP authentication
		//$this->mail->Username = "peter@demartini.com"; // SMTP username
		//$this->mail->Password = "P6138494D"; // SMTP password
		//$this->mail->SMTPDebug = 1;
		$this->mail->Host = "demartini.com";
		$this->mail->SetFrom('webmaster@demartini.com');
		$this->load_data();
		$this->create_msg();
	}

	private function load_data(){
		if(isset($_POST['xx_to'])){
			if(is_array($_POST['xx_to'])){
				foreach($_POST['xx_to'] as $to){
					$this->mail->AddAddress($to);
				}
			}else{
				$this->mail->AddAddress($_POST['xx_to']);
			}
		}
		if(isset($_POST['xx_cc'])){
			if(is_array($_POST['xx_cc'])){
				foreach($_POST['xx_cc'] as $cc){
					$this->mail->AddCC($cc);
				}
			}else{
				$this->mail->AddAddress($_POST['xx_cc']);
			}
		}
		if(isset($_POST['xx_from'])){
			$this->mail->SetFrom($_POST['xx_from']);
		}

		if(isset($_POST['xx_subject'])){
			$this->mail->Subject = $_POST['xx_subject'];
		}else{
			$this->mail->Subject = 'Gerneric Form - Could be spam';
		}
		$count = 0;
		if(isset($_FILES['uploads']['name'])){
			foreach ($_FILES['uploads']['name'] as $filename){
				 $target = realpath('uploads') . DIRECTORY_SEPARATOR;
				 $target = $target . basename( $filename ) ;
				 $tmp = $_FILES['uploads']['tmp_name'][$count];
				 if(move_uploaded_file($tmp, $target)){
				 	//do nothing
				 }else {
				 	$reponse = "Sorry, there was a problem uploading your file.";
				 }
				$this->mail->AddAttachment($target);
				$count++;
			}
		}
	}

	public function setReplyTo($from, $from_name){
		if($from !== false){
			$this->mail->AddReplyTo($from, $from_name);
		}
	}

	public function send(){
		//Send email
		$sent = $this->mail->Send();
		if($sent){
			//$referrer = $_SERVER['HTTP_REFERER'];
			$result_page = "forms/form_success";
			header('Location: ' . $result_page);
			//echo "Success :: " . $referrer;
		}else{
			echo "There has been an error processing your request.";
			echo $this->mail->ErrorInfo;
		}
	}

	private function create_msg(){
		$msg = $this->mail->Subject . ": <br /><br /><ul>";
		foreach($_POST as $key => $val){
			if($key == 'submit'
				|| $key == 'MAX_FILE_SIZE'
				|| $key == 'VTI-GROUP'){
				continue;
			}
			if(stripos($key, 'xx_') !== false){
				continue;
			}
			$msg .= "<li><b>" . $this->make_readable($key) . ":</b> " . $val . " </li>";
		}
		$msg .= "</ul><br /><br /> The end of the message.";
		$this->mail->MsgHTML($msg);
	}


	private function make_readable($string){
		$string = str_ireplace('_', ' ', $string);
		$string = ucwords($string);
		return $string;
	}
}

?>