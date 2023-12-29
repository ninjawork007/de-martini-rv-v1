<?php
class Exterior_equipment extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('name')	
	);
	static $has_many = array(
		array('vehicles' , 'through' => 'vehicleexteriorequipment'),
		array('vehicleexteriorequipment'),
		array('model_specifics' , 'through' => 'modelspecificexteriorequipment'),
		array('modelspecificexteriorequipment'),
	);

	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Exterior_equipment::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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
