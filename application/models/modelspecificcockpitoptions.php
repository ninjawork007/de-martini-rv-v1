<?php
class Modelspecificcockpitoptions extends ActiveRecord\Model
{
	static $table_name = 'modelspecific_cockpit_options';

	static $belongs_to = array(
		array('modelspecific', 'class_name' => 'Model_specific'),
		array('cockpit_options', 'class_name' => 'Cockpit_option')
	);
}
