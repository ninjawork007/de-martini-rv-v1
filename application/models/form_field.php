<?php
class Form_field extends ActiveRecord\Model {

	
	static $validates_presence_of = array(
		array('label'), 
		array('name')	
    );


	static function paginate_all($limit, $page, $form_id)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Form_field::find('all', array('limit' => $limit, 'offset' => $offset, 'conditions' => 'form_fields.form_id = "'.$form_id.'"', 'order' => 'id DESC' ) );

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