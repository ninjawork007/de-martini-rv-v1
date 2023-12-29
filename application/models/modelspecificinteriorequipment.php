<?php
class Modelspecificinteriorequipment extends ActiveRecord\Model
{
	static $table_name = 'modelspecific_interior_equipment';

	static $belongs_to = array(
		array('modelspecific', 'class_name' => 'Model_specific'),
		array('interior_equipment', 'class_name' => 'Interior_equipment')
	);
}
