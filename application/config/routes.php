<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller']           = "index/index";

$route['404_override']                 = '';

$route['contact']                      = "index/contact";

$route['admin/login']                        = "admin/users/login";
$route['admin/logout']                       = "admin/users/logout";
$route['admin/forgot_password']              = "admin/users/forgot_password";
$route['admin/reset_password/(:any)']        = "admin/users/reset_password/$1";

$route['admin']                        = "admin/admin/index";

//Sitemap
$route['sitemap\.xml'] = "vehicles/sitemap";

$route['details/service'] = "index/service";
$route['details/partsform'] = "index/partsform";
$route['details/parts_service'] = "index/parts_service";
$route['details/location'] = "index/location";
$route['details/credit'] = "index/credit";
$route['details/salesmap'] = "index/salesmap";
$route['details/covid19'] = "index/covid19";

$route['vehicles/stock/(:any)'] = 'vehicles/by_stock/$1';
$route['rv/(:any)'] = 'vehicles/by_stock/$1';
$route['([A-Za-z]{0,1}\d{4})'] = 'vehicles/by_stock/$1';

//categories
$route['admin/categories/(:num)']      = "admin/categories/index/$1";

//products
$route['admin/products/(:num)']        = "admin/products/index/$1";
$route['admin/products/(:num)/(:num)'] = "admin/products/index/$1/$2";

//groups
$route['admin/groups/(:num)']          = 'admin/groups/index/$1';

//statuses
$route['admin/statuses/(:num)'] = 'admin/statuses/index/$1';

//images
$route['admin/images/(:num)'] = 'admin/images/index/$1';

//cockpit_options
$route['admin/cockpit_options/(:num)'] = 'admin/cockpit_options/index/$1';

//bedroom_layouts
$route['admin/bedroom_layouts/(:num)'] = 'admin/bedroom_layouts/index/$1';

//bath_layouts
$route['admin/bath_layouts/(:num)'] = 'admin/bath_layouts/index/$1';

//flooring
$route['admin/flooring/(:num)'] = 'admin/flooring/index/$1';

//furniture
$route['admin/furniture/(:num)'] = 'admin/furniture/index/$1';

//chassis
$route['admin/chassis/(:num)'] = 'admin/chassis/index/$1';

//slides
$route['admin/slides/(:num)'] = 'admin/slides/index/$1';

//engines
$route['admin/engines/(:num)'] = 'admin/engines/index/$1';

//vehicle_templates
$route['admin/vehicle_templates/(:num)'] = 'admin/vehicle_templates/index/$1';

//vehicles
$route['admin/vehicles/(:num)'] = 'admin/vehicles/index/$1';
$route['admin/vehicles/(:num)/(:num)'] = 'admin/vehicles/index/$1/$2';

//vehicles
$route['admin/vehicles/(:num)'] = 'admin/vehicles/index/$1';

//furnitures
$route['admin/furnitures/(:num)'] = 'admin/furnitures/index/$1';

//floorings
$route['admin/floorings/(:num)'] = 'admin/floorings/index/$1';

//interior_equipments
$route['admin/interior_equipments/(:num)'] = 'admin/interior_equipments/index/$1';

//exterior_equipments
$route['admin/exterior_equipments/(:num)'] = 'admin/exterior_equipments/index/$1';

//statuses
$route['admin/statuses/(:num)'] = 'admin/statuses/index/$1';

//testimonials
$route['admin/testimonials/(:num)'] = 'admin/testimonials/index/$1';

//form_fields
$route['admin/form_fields/(:num)'] = 'admin/form_fields/index/$1';

//forms
$route['admin/forms/(:num)'] = 'admin/forms/index/$1';

//uploads
$route['admin/uploads/(:num)'] = 'admin/uploads/index/$1';

//floor_plans
$route['admin/floor_plans/(:num)'] = 'admin/floor_plans/index/$1';

//model_specifics
$route['admin/model_specifics/(:num)'] = 'admin/model_specifics/index/$1';
