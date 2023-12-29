<?php
class Modelspecificbathlayouts extends ActiveRecord\Model
{
	static $table_name = 'modelspecific_bath_layouts';

	static $belongs_to = array(
		array('modelspecific', 'class_name' => 'Model_specific'),
		array('bath_layouts', 'class_name' => 'Bath_layout')
	);
}
