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

$route['default_controller'] = 'Home';
$route['track-your-order'] = 'Track';
$route['track-your-order/search'] = 'Track/search';
$route['how-it-works'] = 'Works';
$route['faqs'] = 'Faqs';
$route['blogs'] = 'Blogs';
$route['blog/(:any)'] = 'Blogs/detail/$1';
$route['contact-us'] = 'Contact';


$route['admin/promocode'] = 'admin/PromoCode';
$route['admin/contact-queries'] = 'admin/Contact';
$route['admin/categories'] = 'admin/Categories';
$route['admin/categories/(:any)'] = 'admin/Categories/$1';
$route['admin/condition'] = 'admin/Condition';
$route['admin/condition/(:any)'] = 'admin/Condition/$1';
$route['admin/models'] = 'admin/Models';
$route['admin/models/(:any)'] = 'admin/Models/$1';
$route['admin/pricing'] = 'admin/Pricing';
$route['admin/pricing/(:any)'] = 'admin/Pricing/$1';
$route['admin/providers'] = 'admin/Providers';
$route['admin/providers/(:any)'] = 'admin/Providers/$1';
$route['admin/storage'] = 'admin/Storage';
$route['admin/storage/(:any)'] = 'admin/Storage/$1';
$route['admin/current-trade-ins'] = 'admin/Trades';
$route['admin/trade-ins/needs-shipping-kit'] = 'admin/Trades/needs_shipping_kit';
$route['admin/trade-ins/received-needs-inspection'] = 'admin/Trades/received_needs_inspection';
$route['admin/trade-ins/requote-pending'] = 'admin/Trades/requote_pending';
$route['admin/trade-ins/seller-action-pending'] = 'admin/Trades/seller_action_pending';
$route['admin/trade-ins/requote-completed'] = 'admin/Trades/requote_completed';
$route['admin/trade-ins/seller-action-completed'] = 'admin/Trades/seller_action_completed';
$route['admin/trade-ins/requote-rejected'] = 'admin/Trades/requote_rejected';
$route['admin/trade-ins/needs-payment'] = 'admin/Trades/needs_payment';
$route['admin/past-trades'] = 'admin/Trades/past_trades';
$route['admin/trades/(:any)'] = 'admin/Trades/$1';
$route['admin/faqs'] = 'admin/Faqs';
$route['admin/faqs/(:any)'] = 'admin/Faqs/$1';
$route['admin/posts'] = 'admin/Blogs';
$route['admin/posts/(:any)'] = 'admin/Blogs/$1';
$route['admin/posts/edit/(:any)'] = 'admin/Blogs/Edit/$1';
$route['admin'] = 'admin/Admin';
$route['admin/(:any)'] = 'admin/Admin/$1';

$route['sell/(:any)/(:any)/(:any)/(:any)'] = 'Sell/condition/$1/$2/$3/$4';
$route['sell/(:any)/(:any)/(:any)'] = 'Sell/storage/$1/$2/$3';
$route['sell/(:any)/(:any)'] = 'Sell/providers/$1/$2';
$route['sell/checkpromo'] = 'Sell/checkpromo';
$route['sell/(:any)'] = 'Sell/models/$1';
$route['sell'] = 'Sell/index';
$route['shipping'] = 'Shipping/index';
$route['shipping/verify-address'] = 'Shipping/address_verify';
$route['get/conditon_details'] = 'Sell/get_crecord';
$route['get/pricing'] = 'Sell/get_pricing';
$route['cart/add'] = 'Order/add_to_cart';
$route['order/payment'] = 'Order/payment';
$route['order/contact-details'] = 'Order/contact';
$route['order/update-item'] = 'Order/update_cart_item';
$route['order/confirm-order'] = 'Order/place_order';
$route['trade/requote/accept/(:any)'] = 'Order/requote_accept/$1';
$route['trade/requote/reject/(:any)'] = 'Order/requote_reject/$1';
$route['trade/seller-action/accept/(:any)'] = 'Order/seller_accept/$1';
$route['trade/seller-action/reject/(:any)'] = 'Order/seller_reject/$1';


$route['(:any)'] = 'Blogs/page/$1';



//$route['admin/(:any)'] = 'admin/Categories/$1';
// $route['login'] = 'Admin/login';
// $route['logout'] = 'Admin/logout';
// $route['dashboard'] = 'Admin/dashboard';

// $route['templates'] = 'KPI/templates';
// $route['template/heads/(:any)'] = 'KPI/heads/$1';
// $route['staff/(:any)'] = 'Staff/$1';

// $route['updatesettings'] = 'Admin/updatesettings';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
