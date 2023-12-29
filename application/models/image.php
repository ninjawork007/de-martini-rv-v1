<?php
class Image extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('title'), 
		array('group_id')	
	);
	static $has_many = array(
		array('vehicles' , 'through' => 'vehicleimages', 'class_name' => 'Vehicleimages'),
		array('vehicleimages', 'class_name' => 'Vehicleimages')
	);


	static function paginate_all($limit, $page, $vehicle_id = NULL)
	{
		$offset = $limit * ( $page - 1) ;

		if(isset($vehicle_id)){
			$result = Image::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC', 'conditions' => 'vehicle_images.vehicle_id = "'.$vehicle_id.'" AND images.id IS NOT NULL AND images.id != ""', 'joins' => 'RIGHT JOIN vehicle_images ON vehicle_images.image_id = images.id' ) );
		}else{
			$result = Image::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC') );
		}

		if ($result)
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}
	
	static function count_all($vehicle_id = NULL)
	{
		if(isset($vehicle_id)){
			$result = Image::count(array(
			    'conditions' => 'vehicle_images.vehicle_id = "'.$vehicle_id.'" AND images.id IS NOT NULL AND images.id != ""', 
			    'joins' => 'RIGHT JOIN vehicle_images ON vehicle_images.image_id = images.id'
                )
			 );
		}else{
			$result = Image::count();
		}

		if ($result)
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}


}
