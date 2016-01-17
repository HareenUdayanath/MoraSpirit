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

Route::get('/', 'MoraController@home');

Route::get('first', array('as'=>'first','uses'=>'MoraController@first'));

Route::get('reg', array('as'=>'register','uses'=>'MoraController@addUser'));

Route::get('home', 'HomeController@index');

Route::get('moraLogin', 'MoraController@login');

Route::get('in', 'MoraController@in');
Route::get('getUsers/{id}',array('as'=>'getUsers','uses'=>'MoraController@getUsersOf'));


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

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

Route::get('admin', 'MoraController@showAdmin');

Route::get('eqprecieval', 'KeeperController@getEqpRc');

Route::get('res_res', 'KeeperController@getReserve');

Route::get('eqplending', 'KeeperController@getSports');

Route::get('eqpUpdateDetails', 'KeeperController@getUpDt');

Route::get('admin', 'MoraController@showAdmin');

Route::get('addPra', 'CoachController@addPracticeSchedule');

Route::get('displaySchedule', array('as'=>'displaySchedule','uses'=>'CoachController@displayPracticeSchedulePage'));

Route::get('displayAchieve', array('as'=>'displayAchieve','uses'=>'CoachController@displayAchievementPage'));

Route::get('addPS', array('as'=>'addPracticeSchedule','uses'=>'CoachController@addPracticeSchedule'));

Route::get('addAC', array('as'=>'addAchievement','uses'=>'CoachController@addAchievement'));

Route::get('getRes/{sportName}', 'CoachController@getResources');

Route::get('loadeqp/{sport}', 'KeeperController@loadeqp');

Route::get('chkAv/{equipment}/{sport}', 'KeeperController@checkEqpAv');

Route::get('getUpEqp/{eqpID}', 'KeeperController@getUpEqp');
