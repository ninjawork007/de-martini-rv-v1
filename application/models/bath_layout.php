<?php
class Bath_layout extends ActiveRecord\Model {


	static $validates_presence_of = array(
		array('name')	
	);
	static $has_many = array(
		array('vehicles' , 'through' => 'vehiclebathlayouts'),
		array('vehiclebathlayouts', 'class_name' => 'Vehiclebathlayouts'),
		array('model_specifics' , 'through' => 'modelspecificbathlayouts'),
		array('modelspecificbathlayouts', 'class_name' => 'Modelspecificbathlayouts')
	);


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Bath_layout::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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
