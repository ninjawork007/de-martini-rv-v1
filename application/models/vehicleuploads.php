<?php
class Vehicleuploads extends ActiveRecord\Model
{
	static $table_name = 'vehicle_upload';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('upload', 'class_name' => 'Upload')
	);
}
