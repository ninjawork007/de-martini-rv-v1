<?php
class Modelspecificexteriorequipment extends ActiveRecord\Model
{
	static $table_name = 'modelspecific_exterior_equipment';

	static $belongs_to = array(
		array('modelspecific', 'class_name' => 'Model_specific'),
		array('exterior_equipment', 'class_name' => 'Exterior_equipment')
	);
}
