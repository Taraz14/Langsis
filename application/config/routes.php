<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'AuthController';
$route['dashboard'] = 'HomeController';

$route['profile'] = 'Profile';

/**
 * Authentication
 */
$route['login'] = 'AuthController';
$route['logout'] = 'AuthController/logout';

/**
 * Admin Route
 */
$route['0/jurusan'] = 'admin/JurusanController';
$route['0/kelas'] = 'admin/KelasController';
$route['0/siswa'] = 'admin/SiswaController';
$route['0/guru'] = 'admin/GuruController';
$route['0/pelanggaran'] = 'admin/PelanggaranController';
$route['0/detail-pelanggaran'] = 'admin/Detail_pelanggaranController';
$route['0/detail-pelanggar/(:any)'] = 'admin/pelanggaranController/get_detail/$1';

/**
 * Guru Route
 */
$route['1/data-siswa'] = 'guru/SiswaController';
$route['1/pelanggaran'] = 'guru/Pelanggaran';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
