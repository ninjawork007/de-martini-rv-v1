<?php
class Modelspecificbedroomlayouts extends ActiveRecord\Model
{
	static $table_name = 'modelspecific_bedroom_layouts';

	static $belongs_to = array(
		array('modelspecific', 'class_name' => 'Model_specific'),
		array('bedroom_layouts', 'class_name' => 'Bedroom_layout')
	);
}
