<?php
class Flooring extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('name')	
	);
	static $has_many = array(
		array('vehicles' , 'through' => 'vehicleflooring'),
		array('vehicleflooring'),
		array('model_specifics' , 'through' => 'modelspecificflooring'),
		array('modelspecificflooring')
	);

	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Flooring::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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
