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
Route::get('/', function () {
    return view('home');
});



Auth::routes();
// Two Factor Authentication
Route::get('/otp', 'TwoFactorController@showTwoFactorForm');
Route::post('/otp', 'TwoFactorController@verifyTwoFactor');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', ['as' => 'dashboard' , function () {
   return view('dashboard');
}])->middleware('auth');

Route::get('/changepassword', ['as' => 'changepassword' , function () {
    return view('changepassword');
 }])->middleware('auth');

 Route::get('/profile', ['as' => 'profile' , function () {
    return view('profile');
 }])->middleware('auth');

 Route::resource('roles', 'RolesController')->middleware('auth');


 //Sub admins/staff
 Route::get('/resetpassword/{id}', 'UserController@resetPassword')->middleware('auth');
 Route::get('/admins/deactivate/{id}', 'UserController@deactivate')->middleware('auth');
 Route::get('/admins/active/{id}', 'UserController@active')->middleware('auth');
 Route::resource('admins', 'UserController')->middleware('auth');

 //Category
 Route::resource('categories', 'CategoryController')->middleware('auth');
 
 //Lead
 Route::get('/lead/leadcreate', 'UserController@create_lead')->middleware('auth');
 Route::post('/lead', 'UserController@store_lead')->middleware('auth');
 Route::get('/lead/leadview', 'UserController@view_lead')->middleware('auth');
 Route::get('/lead/{id}/edit', 'UserController@edit_lead')->middleware('auth');
 Route::post('/lead/{id}', 'UserController@update_lead')->middleware('auth');
 Route::get('/lead/lead_detail/{id}', 'UserController@view_lead_detail')->middleware('auth'); 
 Route::get('/lead/deactivate_lead/{id}', 'UserController@deactivate_lead')->middleware('auth'); 
 Route::get('/lead/active_lead/{id}', 'UserController@active_lead')->middleware('auth');  
 Route::delete('/lead/destroy_lead/{id}', 'UserController@destroy_lead')->middleware('auth');  
 
 //Recording
 Route::get('/recording/{id}/recordingcreate', 'UserController@create_recording')->middleware('auth');
 Route::post('/recording', 'UserController@store_recording')->middleware('auth');
 Route::get('/recording/recordingview', 'UserController@view_recording')->middleware('auth'); 
 Route::get('/recording/recording_detail/{id}', 'UserController@view_recording_detail')->middleware('auth');
 Route::delete('/recording/destroy_recording/{id}', 'UserController@destroy_recording')->middleware('auth');  
 //Route::resource('recordings', 'UserController')->middleware('auth');
 