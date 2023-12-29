<?php
class Bedroom_layout extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('name')	
	);
	static $has_many = array(
		array('vehicles' , 'through' => 'vehiclebedroomlayouts', 'class_name' => 'Vehiclebedroomlayouts'),
		array('vehiclebedroomlayouts', 'class_name' => 'Vehiclebedroomlayouts'),
		array('model_specifics' , 'through' => 'modelspecificbedroomlayouts', 'class_name' => 'Modelspecificbedroomlayouts'),
		array('modelspecificbedroomlayouts', 'class_name' => 'Modelspecificbedroomlayouts')
	);

	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Bedroom_layout::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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
