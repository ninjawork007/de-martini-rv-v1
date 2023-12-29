<?php
class Modelspecificfurniture extends ActiveRecord\Model
{
	static $table_name = 'modelspecific_furniture';

	static $belongs_to = array(
		array('modelspecific', 'class_name' => 'Model_specific'),
		array('furniture', 'class_name' => 'Furniture')
	);
}
