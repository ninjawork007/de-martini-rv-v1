<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'useragent'	=> 'DeMartiniRV Sales',
	'protocol'	=> 'smtp',
	'smtp_host' => 'smtp.sendgrid.net',
	'smtp_user' => 'peterdemartini',
	'smtp_pass' => 'baj8yI9kaV9R',
	'smtp_port' => ENVIRONMENT === 'development' ? 587 : 25,
	'mailtype' 	=> 'html',
	'wordwrap' 	=> FALSE,
	'crlf' 		=> "\r\n",
	'newline' 	=> "\r\n"
);


