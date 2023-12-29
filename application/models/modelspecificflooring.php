<?php
class Modelspecificflooring extends ActiveRecord\Model
{
	static $table_name = 'modelspecific_flooring';

	static $belongs_to = array(
		array('modelspecific', 'class_name' => 'Model_specific'),
		array('flooring', 'class_name' => 'Flooring')
	);
}
