<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('test', function(){
	return View('test');
});

Route::get('first', array('as'=>'first','uses'=>'MoraController@first'));

Route::get('reg', array('as'=>'register','uses'=>'MoraController@addUser'));

Route::get('home', 'HomeController@index');

Route::get('temp', 'MoraController@temp');

Route::get('user', 'MoraController@seeUser');

Route::get('login', 'MoraController@login');

Route::get('register', array('as'=>'registerForm','uses'=>'MoraController@register'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('adminHome', array('as'=>'adminHome','uses'=>'AdminController@displayHomePage'));

Route::get('adminUsers', array('as'=>'adminUsers','uses'=>'AdminController@displayUserPage'));

Route::get('adminSports', array('as'=>'adminSports','uses'=>'AdminController@displaySportPage'));

Route::get('adminEquipments', array('as'=>'adminEquipments','uses'=>'AdminController@displayEquipmentPage'));

Route::get('adminResources', array('as'=>'adminResources','uses'=>'AdminController@displayResourcePage'));

Route::get('adminStudents', array('as'=>'adminStudents','uses'=>'AdminController@displayStudentPage'));

Route::get('adminAddUser', array('as'=>'adminAddUser','uses'=>'AdminController@displayAddUserPage'));

Route::get('admin', 'MoraController@showAdmin');

Route::get('addPra', 'CoachController@addPracticeSchedule');

Route::get('addAchi', 'CoachController@addAchievement');