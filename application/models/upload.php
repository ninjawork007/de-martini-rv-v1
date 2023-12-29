<?php
class Upload extends ActiveRecord\Model {

	var $upload_url;
	var $image_url;
	var $pdf_url;
	var $path;
	
	static $has_many = array(
		array('vehicles', 'class_name' => 'Vehicle', 'through' => 'Vehicleuploads'),
		array('Vehicleuploads', 'class_name' => 'Vehicleuploads'),
	);
	
	static $validates_presence_of = array(
		array('name')	
    );

	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Upload::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

		if ($result)
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}

    private function process_item(&$item){
        if(!empty($item->file)){
            $url = '/public/uploads/uploads/files/' . $item->file;
            $path = FCPATH.'public' .$url;
            $item->path = $path;
            $item->upload_url = $url;
            if(in_array(
                pathinfo($path, PATHINFO_EXTENSION), 
                array(
                    'jpg',
                    'png', 
                    'jpeg', 
                    'gif'
                ))){
                $item->image_url = $item->upload_url;
            }else if(in_array(
                pathinfo($path, PATHINFO_EXTENSION), 
                array(
                    'pdf',
                    'PDF'
                ))){
                $item->pdf_url = $item->upload_url;
            }else{
                $item->image_url = false;
            }
        } 
    }
	
	static function find_by_id($id){
    	$upload = parent::find_by_id($id);
    	if($upload)
            self::process_item($upload);
        return $upload;
	}
	
	static function find($a, $b=false){
	    if($b===false)
        	$result = parent::find($a);
        else
            $result = parent::find($a, $b);
    	//echo Vehicle::connection()->last_query;
		//die();
        if(!$result) return false;
        if(is_array($result)){
            foreach($result as &$item){
    			 self::process_item($item);
    		}
		}else{
            self::process_item($result);
		}
        return $result;
	}
}