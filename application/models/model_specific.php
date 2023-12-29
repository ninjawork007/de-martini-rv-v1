<?php
class Model_specific extends ActiveRecord\Model {

    static $has_many = array(
        array('cockpit_options', 'class_name' => 'Cockpit_option', 'through' => 'modelspecificcockpitoptions'),
        array('modelspecificcockpitoptions', 'class_name' => 'Modelspecificcockpitoptions'),
        array('bath_layouts', 'class_name' => 'Bath_layout', 'through' => 'modelspecificbathlayouts'),
        array('modelspecificbathlayouts', 'class_name' => 'Modelspecificbathlayouts'),
        array('bedroom_layouts', 'class_name' => 'Bedroom_layout', 'through' => 'modelspecificbedroomlayouts'),
        array('modelspecificbedroomlayouts', 'class_name' => 'Modelspecificbedroomlayouts'),
        array('furniture', 'class_name' => 'Furniture', 'through' => 'modelspecificfurniture'),
        array('modelspecificfurniture', 'class_name' => 'Modelspecificfurniture'),
        array('flooring', 'class_name' => 'Flooring', 'through' => 'modelspecificflooring'),
        array('modelspecificflooring', 'class_name' => 'Modelspecificflooring'),
        array('exterior_equipments', 'class_name' => 'Exterior_equipment', 'through' => 'modelspecificexteriorequipment'),
        array('modelspecificexteriorequipment'),
        array('interior_equipments', 'class_name' => 'Interior_equipment', 'through' => 'modelspecificinteriorequipment'),
        array('modelspecificinteriorequipment'),
    );

    static $validates_presence_of = array(
        array('year'),
        array('make'),
        array('model')
    );


    static function paginate_all($limit, $page)
    {
        $offset = $limit * ( $page - 1) ;

        $result = Model_specific::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

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