<?php
class Form extends ActiveRecord\Model {

	
	static $validates_presence_of = array(
		array('to_emails'), 
		array('cc_emails'), 
		array('send_copy_to_customer')	
    );


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Form::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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