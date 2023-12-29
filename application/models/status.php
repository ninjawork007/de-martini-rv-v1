<?php
class Status extends ActiveRecord\Model {

	
	static $validates_presence_of = array(
			array('name')	
    );


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Status::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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