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
$route['default_controller'] = 'adminControl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['adminControl']='adminControl';
$route['index']='adminControl/index';
$route['dashboard']='adminControl/dashboard';
$route['changePassword']='adminControl/changePassword';
$route['editUserProfile']='adminControl/editUserProfile';
$route['profile']='adminControl/profile';
$route['logout']='adminControl/logout';


$route['addCategory']='categoryController/addCategory';
$route['saveCategory']='categoryController/saveCategory';
$route['searchCategory']='categoryController/searchCategory';
$route['manageCategory']='categoryController/manageCategory';
$route['editCategory']='categoryController/editCategory';
$route['deleteCategory']='categoryController/deleteCategory';

$route['addQuestion']='questionController/addQuestion';
$route['saveQuestion']='questionController/saveQuestion';
$route['searchQuestion']='questionController/searchQuestion';
$route['manageQuestion']='questionController/manageQuestion';
$route['editQuestion']='questionController/editQuestion';
$route['deleteQuestion']='questionController/deleteQuestion';

$route['addResult']='resultController/addResult';
$route['saveResult']='resultController/saveResult';
$route['searchResult']='resultController/searchResult';
$route['manageResult']='resultController/manageResult';
$route['editResult']='resultController/editResult';
$route['deleteResult']='resultController/deleteResult';

$route['about']='control/about';


//$route['(:any)']='adminControl/$1';

//category [get] listing
//category/add [get] add view page
//category/add [post] submit data and redirect user to listing page or add page if error
//category/edit/5 [get] edit view page
//category/edit [post] submit data and redirect user to listing page or edit page if error
//category/delete [post] submit data to delete record


