<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Automanager {

	private $url = 'http://clients.automanager.com/003370/inventory.xml?ID=003370&Features=1&Photos=1';

	public function __construct(){

	}

	public function get_latest(){
		$CI =& get_instance();

		$CI->load->library('Format');
		$CI->load->library('curl');
		//GET DATA
		$CI->curl->create($this->url);
		$CI->curl->options(array(
			CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9) Gecko/2008052906 Firefox/3.0"
		));
		$CI->curl->post(array());
		$raw = $CI->curl->execute();
		//END GET DATA

		//echo $raw;
		// Errors
		//echo $CI->curl->error_code; // int
		//echo $CI->curl->error_string;

		// Information
		//var_dump($CI->curl->info); // array 
		//var_dump($this->url);

		//Convert to Array
		$res = $CI->format->factory($raw, 'xml')->to_array();
		//End Convert
		//Parse Data
		$vehicles = @$this->process_data($res);
		//End Parse Data
		/*
		echo "<pre>";
		var_dump($res);
		echo "</pre>";
		die();
		 */
		return $vehicles;
	}

	private function process_data($res){
		$data = array();
		foreach($res['Vehicle'] as $v){
			$map = array(
				'fields' => array(
					'item_number' => $this->set_val($v['StockNum']),
					'vin' => $this->set_val($v['VIN']),
					'year' => $this->set_val($v['Year']),
					'make' => $this->set_val($v['Make']),
					'model' => $this->set_val($v['Model']),
					'mileage' => $this->set_val($v['Mileage']),
					'interior_color' => $this->set_val($v['IntColor']),
					'exterior_color' => $this->set_val($v['ExtColor']),
					'asking_price' => $this->set_val($v['ShowroomPrice']),
					'sale_price' => $this->set_val($v['InternetPrice']),
					'description' => $this->set_val($v['Description']),
					'vehicle_condition' => strtolower($this->set_val($v['Type'])),
					'transmission' => $this->set_val($v['Transmission']),
					'title' => $this->set_val($v['Title']),
					'tagline' => $this->set_val($v['Tagline']),
					'model_number' => $this->set_val($v['ModelNum']),
					'warranty_title' => $this->set_val($v['WarrantyTitle']),
					'warranty_description' => $this->set_val($v['WarrantyDescription']),
					'style' => $this->set_val($v['Style']),
					'drivetrain' => $this->set_val($v['Drivetrain']),
				),
				'images' => $this->set_val($v['PhotoURLs']['PhotoURL']),
			);
	
			$data[] = $map;
		}
		return $data;
	}

	private function set_val($val, $type = ''){
		if($type == 'date') return date('Y-m-d', strtotime($val));
		if($type == 'datetime') return date('Y-m-d H:i:s', strtotime($val));
		if(is_null($val)) return NULL;
		if(is_array($val) && count($val) == 0) return '';
		return $val;
	}
}

/* End of file Someclass.php */
