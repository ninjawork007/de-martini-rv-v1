<?php
class Cockpit_option extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('name'),	
	);
	static $has_many = array(
	    array('model_specifics', 'class_name' => 'Vehicle', 'through' => 'modelspecificcockpitoptions'),
		array('modelspecificcockpitoptions', 'class_name' => 'Modelspecificcockpitoptions'),
		array('vehicles', 'class_name' => 'Vehicle', 'through' => 'vehiclecockpitoptions'),
		array('vehiclecockpitoptions', 'class_name' => 'Vehiclecockpitoptions'),
	);


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Cockpit_option::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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
