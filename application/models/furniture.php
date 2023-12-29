<?php
class Furniture extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('name')	
	);
	static $has_many = array(
		array('vehicles' , 'through' => 'vehiclefurniture'),
		array('vehiclefurniture'),
		array('model_specifics' , 'through' => 'modelspecificfurniture'),
		array('modelspecificfurniture')
	);

	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Furniture::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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
