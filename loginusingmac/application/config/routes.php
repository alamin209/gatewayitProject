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
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['automation']='Welcome/automation';
$route['security']='Welcome/security';
$route['security2']='Welcome/security2';
$route['security3']='Welcome/security3';
$route['energy']='Welcome/energy';
$route['installation']='Welcome/installation';
$route['interior']='Welcome/interior';
$route['design']='Welcome/design';
$route['led']='Welcome/led';
$route['cctv']='Welcome/cctv';
$route['about']='Welcome/about';
$route['contact']='Welcome/contact';
$route['description/(:num)']='Welcome/description/$1';

/*--admin--*/
$route['admin_login']='Admin/admin_login';
$route['master']='Super_admin/index';
$route['slider']='Super_admin/slider';
$route['cpassword']='Super_admin/cpassword';
$route['change_password']='Super_admin/change_password';
$route['logout']='Super_admin/logout';


$route['products']='Super_admin/product';
$route['add_product']='Super_admin/add_product';
$route['product_save']='Super_admin/product_save';
$route['delete_product/(:num)']='Super_admin/delete_product/$1';

