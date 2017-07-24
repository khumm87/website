<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']			 = 'form_controller';
$route['menu/download']					 = 'form_controller/view_download';
$route['menu/faq']					 	 = 'form_controller/view_faq';
$route['menu/registration']				 = 'form_controller/online_registration';
$route['menu/profile']					 = 'form_controller/view_profile';
$route['404_override'] = '';

$route['read/article/(:any)']		 	 = 'form_controller/article/$1';

/*paging article routes*/
$route['paging/page']		 			 = 'form_controller/';
$route['paging/page/(:num)']	 		 = 'form_controller/view/$1';

$route['panel'] 						 = 'C_panel';
$route['panel/auth'] 					 = 'C_panel/auth';
$route['panel/home'] 					 = 'admin';