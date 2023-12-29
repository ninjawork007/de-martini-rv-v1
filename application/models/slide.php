<?php
class Slide extends ActiveRecord\Model {

	
	static $validates_presence_of = array(	
    );


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Slide::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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