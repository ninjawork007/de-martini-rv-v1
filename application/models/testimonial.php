<?php
class Testimonial extends ActiveRecord\Model {

	
	static $validates_presence_of = array(
		array('testimonial'), 
		array('display_date'), 
		array('citation')	
    );


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Testimonial::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'display_date DESC' ) );

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