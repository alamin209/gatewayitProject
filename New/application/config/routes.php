<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['cat/(:any)']='Welcome/cat/$1';
$route['subcat/(:any)']='Welcome/subcat/$1';
$route['subcat2/(:num)']='Welcome/subcat2/$1';

/*--Admin Panel--*/

$route['admin_login']='Admin/admin_login';
$route['master']='Super_admin/index';
$route['slider']='Super_admin/slider';
$route['logout']='Super_admin/logout';

$route['add_category']='Super_admin/add_category';
$route['category_save']='Super_admin/category_save';
$route['category']='Super_admin/category';
$route['edit_category/(:num)']='Super_admin/edit_category/$1';
$route['edit_category_save']='Super_admin/edit_category_save';
$route['delete_category/(:num)']='Super_admin/delete_category/$1';

$route['subcategory']='Super_admin/subcategory';
$route['add_subcategory']='Super_admin/add_subcategory';
$route['subcategory_save']='Super_admin/subcategory_save';
$route['edit_subcategory/(:num)']='Super_admin/edit_subcategory/$1';
$route['update_subcategory']='Super_admin/update_subcategory';
$route['delete_subcategory/(:num)']='Super_admin/delete_subcategory/$1';

$route['products']='Super_admin/products';
$route['add_product']='Super_admin/add_product';
$route['product_save']='Super_admin/product_save';
$route['delete_product/(:num)']='Super_admin/delete_product/$1';

$route['client']='Super_admin/client';
$route['active2/(:num)']='Super_admin/active2/$1';
$route['inactive2/(:num)']='Super_admin/inactive2/$1';

$route['order_details']='Super_admin/order_details';
$route['ChangePassword']='Super_admin/change_password';

$route['order_details2']='Welcome/order_details2';
/*--End Admin Panel--*/

/*--Add Cart--*/
$route['add_cart/(:num)']='Add_cart/cart/$1';
$route['show_cart']='Add_cart/show_cart';
$route['remove/(:any)']='Add_cart/remove/$1';
/*--End add Cart--*/