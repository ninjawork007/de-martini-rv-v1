<?php
class Vehicle extends ActiveRecord\Model {

	static $has_many = array(
	    array('uploads', 'class_name' => 'Upload', 'through' => 'vehicleuploads'),
		array('Vehicleuploads', 'class_name' => 'Vehicleuploads'),
		array('cockpit_options', 'class_name' => 'Cockpit_option', 'through' => 'vehiclecockpitoptions'),
		array('vehiclecockpitoptions', 'class_name' => 'Vehiclecockpitoptions'),
		array('bath_layouts', 'class_name' => 'Bath_layout', 'through' => 'vehiclebathlayouts'),
		array('vehiclebathlayouts', 'class_name' => 'Vehiclebathlayouts'),
		array('bedroom_layouts', 'class_name' => 'Bedroom_layout', 'through' => 'vehiclebedroomlayouts'),
		array('vehiclebedroomlayouts', 'class_name' => 'Vehiclebedroomlayouts'),
		array('engines', 'class_name' => 'Engine', 'through' => 'vehicleengine'),
		array('vehicleengine'),
		array('furniture', 'class_name' => 'Furniture', 'through' => 'vehiclefurniture'),
		array('vehiclefurniture'),
		array('flooring', 'class_name' => 'Flooring', 'through' => 'vehicleflooring'),
		array('vehicleflooring'),
		array('exterior_equipments', 'class_name' => 'Exterior_equipment', 'through' => 'vehicleexteriorequipment'),
		array('vehicleexteriorequipment'),
		array('interior_equipments', 'class_name' => 'Interior_equipment', 'through' => 'vehicleinteriorequipment'),
		array('vehicleinteriorequipment'),
		array('images', 'class_name' => 'Image', 'through' => 'vehicleimages'),
		array('vehicleimages', 'class_name' => 'Vehicleimages')
	);
	static $validates_presence_of = array(
		array('category_id'),
		array('status_id'),
		array('template_id'),
		array('year'),
		array('make'),
		array('item_number'),
		array('vin'),
		array('mileage')
	);
	//This must be here to set the value
	var $title;
	var $detail_url;
	var $category;
	var $slide;
	var $floor_plan;
	var $submit_a_bid;
	var $make_an_offer;
	var $cockpit_options_c = array();
	var $bath_layouts_c = array();
	var $bedroom_layouts_c = array();
	var $engine_c = array();
	var $furniture_c = array();
	var $flooring_c = array();
	var $exterior_equipments_c = array();
	var $interior_equipments_c = array();
	var $no_image_thumb;
	var $no_image;
    var $model_specific = null;

	private function process_item(&$item){
        if(empty($item)) return;
        if(empty($item->tagline)) $item->tagline = $item->year . ' ' . $item->make . ' ' . $item->model . ' ' . $item->model_number;
        usort($item->images, array('Vehicle', 'sort_images'));

        foreach($item->images as $i => $img){
            if($img->is_front){
                unset($item->images[$i]);
                array_unshift($item->images, $img);
            }
        }

        if(!$item->images){
            $item->no_image_thumb = 'img/picturessoon205.png';
            $item->no_image = 'img/picturessoon500.png';
        }
        if(!empty($item->category_id)){
            $cat = Category::find(array('conditions' => 'id = "' . $item->category_id . '"'));
            if($cat){
                $item->category = $cat->name;
            }
        }
        if(!empty($item->slide_id)){
            $slide = Slide::find(array('conditions' => 'id = "' . $item->slide_id . '"'));
            if($slide){
                $item->slide = $slide->name;
            }
        }

        if(!empty($item->model_number)){
            $floor_plan = Floor_plan::find(array('conditions' =>
                'name LIKE "' . $item->model_number . '" AND year LIKE "' . $item->year . '" AND model LIKE "' . $item->model .'"'));
            if($floor_plan && isset($floor_plan)){
                $item->floor_plan = $floor_plan;
            }
        }

        $item->submit_a_bid = "<a href='#' class='pure-button' title=''>Submit A Big</a>";
        $item->make_an_offer = "<a href='#' class='pure-button' title=''>Make an Offer</a>";
        $item->detail_url = base_url() . 'vehicles/detail/' . $item->id;
        $conditions = "year LIKE '".$item->year."' AND make LIKE '".$item->make."' AND model LIKE '".$item->model."'";
        if($ms = Model_specific::find('all', array(
                    'conditions' => $conditions
                )
            )){
            if(isset($ms[0])){
                self::merge_ms($item, $ms[0]);
                $item->model_specific = $ms[0];
            }

        }
    }
    /***
    * Merge Model Specific
    ***/
    private function merge_ms(&$item, $ms){
        $vals = array(
            'cockpit_options',
            'bath_layouts',
            'bedroom_layouts',
            'furniture',
            'flooring',
            'exterior_equipments',
            'interior_equipments',
        );

        foreach($vals as $v){
            $vv = $v . '_c';
            $item->$vv = self::merge_ms_val($item->{$v}, $ms->{$v});
        }
    }

    /***
    * Merge Model Specific Value
    ***/
    private function merge_ms_val($a, $b){
        $c = array_merge($b, $a);
        $ids = array();
        foreach($c as $i => $row){
            if(!isset($ids[$row->id]))
                $ids[$row->id] = $row->id;
            else
                unset($c[$i]);
        }
        return $c;
    }

	static function find_by_id($id){
    	$vehicle = parent::find_by_id($id);
    	if($vehicle)
            self::process_item($vehicle);
        return $vehicle;
	}

	static function find_by_stock($stock){
    	$vehicles = parent::find('first', array('conditions' => array( 'item_number' => $stock ) ));
    	$vehicle = isset($vehicles) ? $vehicles : null;
    	if($vehicle){
        self::process_item($vehicle);
    	}
      return $vehicle;
	}

	static function find($a, $b=false){
	    if($b===false)
        	$result = parent::find($a);
        else
            $result = parent::find($a, $b);
    	//echo Vehicle::connection()->last_query;
		if(!$result) return $result;
        foreach($result as &$item){
			 self::process_item($item);
		}
        return $result;
	}

	static function search_all($params, $limit, $page, $order_by = 'item_number DESC'){
		$offset = $limit * ( $page - 1);

		$query_data = self::generate_conditions(self::convert_params($params));
		extract($query_data);
        //var_dump($conditions);
        //die();

        //echo $order_by;

		$result = Vehicle::find(
			'all',
				array(
					'limit' => $limit,
					'offset' => $offset,
					'conditions' => $conditions,
				    'joins' => $joins,
					'order' => $order_by
				)
			);

		if ($result)
			return $result;
		else
			return FALSE;
	}

	static function count_all($params){
		$query_data = self::generate_conditions(self::convert_params($params));
		extract($query_data);

		$result = Vehicle::count(array('conditions' => $conditions, 'joins' => $joins));

		if ($result)
			return $result;
		else
			return 0;
	}


	static function paginate_all($limit, $page)
	{
		$offset = $limit * ( $page - 1) ;

		$result = Vehicle::find('all', array('limit' => $limit, 'offset' => $offset, 'order' => 'id DESC' ) );

		if ($result)
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}

	private function sort_images($a, $b){
    	//if(!empty($a->is_front)) return 1;
		if ($a->position == $b->position) {
			return 0;
		}
		return ($a->position < $b->position) ?  -1 : 1;
	}

	private function convert_params($p){
		$new = array();

		foreach($p as $table => $set){
			$search = array();
			foreach($set as $k => $v){
				$op = 'LIKE';
				if(is_array($v)) $op = 'IN';
				$x = explode('::', $k);
				if(!empty($x[1])){
    				$op = $x[1];
    				$k = $x[0];
				}
				$search[] = array(
					'val' => $v,
					'col' => $k,
					'operator' => $op
				);
			}
			$rel = array(
				'table' => '',
				'fkey' => '',
			);
			switch($table){
				case 'cockpit_options':
					$rel['table'] = 'vehicle_cockpit_options';
					$rel['fkey'] = 'cockpit_option_id';
					break;
				case 'bath_layouts':
					$rel['table'] = 'vehicle_bath_layouts';
					$rel['fkey'] = 'bath_layout_id';
					break;
				case 'bedroom_layouts':
					$rel['table'] = 'vehicle_bedroom_layouts';
					$rel['fkey'] = 'bedroom_layout_id';
					break;
				case 'engines':
					$rel['table'] = 'vehicle_engine';
					$rel['fkey'] = 'engine_id';
					break;
				case 'exterior_equipments':
					$rel['table'] = 'vehicle_exterior_equipment';
					$rel['fkey'] = 'exterior_equipment_id';
					break;
				case 'interior_equipments':
					$rel['table'] = 'vehicle_interior_equipment';
					$rel['fkey'] = 'interior_equipment_id';
					break;
				case 'floorings':
					$rel['table'] = 'vehicle_flooring';
					$rel['fkey'] = 'flooring_id';
					break;
				case 'furnitures':
					$rel['table'] = 'vehicle_furniture';
					$rel['fkey'] = 'flooring_id';
					break;
				case 'images':
					$rel['table'] = 'vehicle_images';
					$rel['fkey'] = 'image_id';
					break;
			}
			$new[] = array(
				'table' => $table,
				'join' => 'right',
				'rel' => $rel,
				'search' => $search,
			);
		}
		return $new;
	}

	static function parse_range($range){
		$range = html_entity_decode($range);
		if(self::test_regex('/(^\d+\-\d+$)/', $range)){
			//Is format 10-100
			$arr = explode('-', $range);
			rsort($arr);
			return $arr;
		}else if(self::test_regex('/(^[><]\d+$)/', $range)){
			//Is format <100 or >1000
			if(strpos($range, '>') !== false){
				return array(
					1 => str_replace('>', '', $range) // Min
				);
			}else if(strpos($range, '<') !== false){
				return array(
					0 => str_replace('<', '', $range) // Max
				);
			}
		}else if(self::test_regex('/(^\d+$)/', $range)){
			//Is format 100
			return array(
				0 => $range, //Max
				1 => $range //Min
			);
		}
		return array(
			0 => $range, //Max
			1 => $range //Min
		);

	}

	private function test_regex($regex, $val){
		preg_match_all($regex, $val, $res);
		return $res !== false && count($res[0]) > 0;
	}


	private function generate_conditions($p){
		$j = array(); //Joins
		$c = array(); //Conditions

		//params format ::
		// 	array(
		//      	0 => array(
		//      		'table' => 'table_name',
		//      		'join' => 'right or left',
		// 			'rel' => array(
		// 				'table' => 'rel_table',
		// 				'fkey' => 'foreign_key',
		// 			),
		// 			'search' => array(
		// 				0 => array(
		// 					'val' => 'value',
		// 					'col' => 'column',
		// 					'operator' => 'LIKE, =, !=, > <, etc'
		// 				)
		// 			)
		//      	)
		// 	);
        $item_number = false;
		foreach($p as $i => $set){
		    if($set['table'] == 'term'){
		        $term_condition = '';
		        foreach($set['search'] as $item){
    		        $x = explode(' ', $item['val']);
    		        foreach($x as $w){
    		            if($term_condition != ''){
        		            $term_condition .= ' OR ';
    		            }
            		    $term_condition .= " (
            		        vehicles.vehicle_condition LIKE '%{$w}%'
            		        OR
            		        vehicles.make LIKE '%{$w}%'
            		        OR
            		        vehicles.model LIKE '%{$w}%'
            		        OR
            		        vehicles.year LIKE '%{$w}%'
            		        OR
            		        vehicles.length LIKE '%{$w}%'
            		        OR
            		        vehicles.series LIKE '%{$w}%'
            		        OR
            		        vehicles.model_number LIKE '%{$w}%'
            		        OR
            		        vehicles.interior_color LIKE '%{$w}%'
            		        OR
            		        vehicles.exterior_color LIKE '%{$w}%'
            		    ) ";
        		    }
                    $term_condition .= " OR vehicles.description LIKE '%{$item['val']}%' ";
                    $term_condition .= " OR vehicles.item_number = '{$item['val']}' ";
                    if(preg_match("/^\\d{3,8}[A-Z]{0,1}$/u", $item['val'])){
                        $item_number = $item['val'];
                    }
                }
    		    $c[] = $term_condition;
    		    continue;
		    }
		    if($set['table'] == 'model_term'){
		        $term_condition = '';
		        foreach($set['search'] as $item){
    		        $x = explode(' ', $item['val']);
    		        foreach($x as $w){
    		            if($term_condition != ''){
        		            $term_condition .= ' AND ';
    		            }
            		    $term_condition .= " (
            		        vehicles.make LIKE '%{$w}%'
            		        OR
            		        vehicles.model LIKE '%{$w}%'
            		    ) ";
        		    }
                }
    		    $c[] = $term_condition;
    		    continue;
		    }
			if($set['table'] != 'vehicles'){
				//Add the Join
				$j[$set['table']] = strtoupper($set['join']) . ' JOIN ' .
					$set['table'] . ' ON ' .
					$set['rel']['table'] . '.' . $set['rel']['fkey'] . ' ' .
					' = ' .
					$set['table'] . '.id';
			}
			// Set the search parameters for that table
			foreach($set['search'] as $item){
                if($item['col'] == 'price'){
                    $c[] = 	'(
                        (
                            ( vehicles.sale_price != "" AND vehicles.sale_price IS NOT NULL )
                            AND
                            vehicles.sale_price ' . $item['operator'] . ' ' . $item['val'] . '
                        )
                        OR
                        (
                            ( vehicles.sale_price = "" OR vehicles.sale_price IS NULL )
                            AND
                            vehicles.asking_price ' . $item['operator'] . ' ' . $item['val'] . '
                        )
                    )';
                    continue;
                }
				if(is_array($item['val'])) $item['val'] = '("' . implode('","', $item['val']) . '")';
				else $item['val'] = '"' . $item['val']. '"';
				$c[] = 	$set['table'] . '.' . $item['col'] . ' ' . $item['operator'] . ' ' . $item['val'];
            }

		}
		//Unset the vehicle join
		unset($j['vehicles']);
		$default_conditions = array();
		//Add Default Conditions
		$statuses_join = "JOIN statuses ON statuses.id = vehicles.status_id ";

		if(!preg_match("/\/admin/u", $_SERVER['REQUEST_URI']) && empty($item_number)){
    		$statuses_join .= ' AND statuses.public = 1 ';
			$default_conditions[] = '( statuses.public = 1 )';
		}
		$j['statuses'] = $statuses_join;
		foreach($default_conditions as $condition)
			$c[] = $condition;

		return array(
			'conditions' => implode(' AND ', $c),
			'joins' => implode(' ', $j)
		);

	}

}
