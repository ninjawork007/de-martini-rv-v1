<?php
class Interior_equipment extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('name')	
	);
	static $has_many = array(
		array('vehicles' , 'through' => 'vehicleinteriorequipment'),
		array('vehicleinteriorequipment'),
		array('model_specifics' , 'through' => 'modelspecificinteriorequipment'),
		array('modelspecificinteriorequipment')
	);


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Interior_equipment::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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
