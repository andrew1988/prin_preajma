<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
//==================================public user routes==========================
$route['default_controller'] = 'home';
$route['locatie'] = 'locatie';
$route['register'] = 'register';
$route['logout'] = 'logout';
$route['categorie/(:any)/(:num)/(:num)'] = 'LocationListingsCategorii/index/$1/$1/$1';
//$route['cath'] = 'MockController';
$route['details/(:any)/(:num)/(:num)'] = 'Location_details/index/$1/$1/$1/';
$route['ratingManagement/(:any)/(:num)'] = 'Location_details/setRating/$1/$1';
$route['edit_profile'] = 'Edit_user';
$route['update_profile'] =  'Edit_user/updateProfile';
$route['view_locations/(:num)'] = 'User_locatii/index/$1';
$route['search'] = 'Search_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//=====================================admin routes=============================
$route['admin_home'] = 'admin_home';
$route['admin_users'] = 'admin_users';
$route['admin_edit_user/(:num)'] = 'admin_users/admin_editUser/$1';
$route['admin_categorii'] = 'admin_categorii';
$route['admin_edit_categorii/(:num)'] = 'admin_categorii/admin_editCategorii/$1';
$route['admin_locations/(:num)'] = 'Admin_locatii/index/$1';
$route['admin_edit_location/(:num)'] = 'Admin_locatii/edit/$1';
$route['admin_update_location'] = 'Admin_locatii/updateLocation';
//====================================ajax routes===============================
$route['ajax_controller'] = 'ajax_controller/index';
