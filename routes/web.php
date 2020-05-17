<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/token-update', 'ApiTokenController@update')->name('home');
Route::get('/', 'HomeController@index');

Route::get('/viewfile/{id}', 'WarehouseController@viewfile');

//Nhập kho
Route::get('/nhapkho', 'WarehouseController@nhapKhoIndex');
Route::get('/lichsunhap/{id}', 'WarehouseController@chitietnhapkho');
Route::post('/nhapkho', 'WarehouseController@nhapkho');
Route::get('/nhapkho/suaphieu/{id}', 'WarehouseController@suaphieunhap');
Route::post('/nhapkho/suaphieu/{id}', 'WarehouseController@luuphieunhap');
//Xuất kho
Route::get('/xuatkho', 'WarehouseController@xuatKhoIndex');
Route::post('/xuatkho', 'WarehouseController@xuatkho');
Route::get('/xuatkho/{id}', 'WarehouseController@chitietxuatkho');
Route::get('/xuatkho/suaphieu/{id}', 'WarehouseController@suaphieuxuat');
Route::post('/xuatkho/suaphieu/{id}', 'WarehouseController@luuphieuxuat');
Route::post('/createfiledata', 'WarehouseController@createFileData');
Route::post('/comfirm-xuatkho', 'WarehouseController@comfirmXuatKho');
Route::get('/hangton', 'WarehouseController@gethangton');


//delivery
Route::get('/delivery', 'WarehouseController@delivery');
Route::post('/delivery', 'WarehouseController@deliveryUpdate');
Route::post('/getinfoorder', 'WarehouseController@getDetailById');


//Hàng trong kho
Route::get('/hangtrongkho', 'WarehouseController@hangtrongkho');


//Kho
Route::get('/danhsachkho', 'WarehouseController@danhsachkho');
Route::post('/themkho', 'WarehouseController@themkho');


//User
Route::get('/danhsachuser', 'UserController@userIndex');
Route::get('/user/{id}', 'UserController@userView');
Route::get('/user-edit/{id}', 'UserController@userEdit');
Route::post('/useredit', 'UserController@userEditPost');

//Category
Route::get('/danhmuchh', 'DanhmucController@index')->name('danhmuc');
Route::post('/categoryinfo','DanhmucController@categoryInfo');
Route::post('/addcategory','DanhmucController@addCategory');
Route::post('/editcategory','DanhmucController@editCategory');
Route::post('/deletecategory','DanhmucController@deleteCategory');

//File upload
Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');


//Báo cáo
Route::get('/baocaokho', 'BaocaoController@baocaokho');

Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');

  // Auth Routes...
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);

Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);

Auth::routes(['verify' => true]);

// // Authentication Routes...
// Route::get('login', [
//   'as' => 'login',
//   'uses' => 'Auth\LoginController@showLoginForm'
// ]);

// Route::post('login', [
//   'as' => '',
//   'uses' => 'Auth\LoginController@login'
// ]);

// Route::post('logout', [
//  'as' => 'logout',
//  'uses' => 'Auth\LoginController@logout'
// ]);

//   // Password Reset Routes...
// Route::post('email', [
//   'as' => 'password.email',
//   'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
// ]);

// Route::get('forgot-password', [
//   'as' => 'password.request',
//   'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
// ]);

// Route::post('forgot-password', [
//   'as' => 'password.update',
//   'uses' => 'Auth\ResetPasswordController@reset'
// ]);

// Route::get('forgot-password/{token}', [
//   'as' => 'password.reset',
//   'uses' => 'Auth\ResetPasswordController@showResetForm'
// ]);




