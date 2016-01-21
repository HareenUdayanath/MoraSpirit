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

Route::get('editProfileView', 'MoraController@editProfileView');

Route::get('publicView', array('as'=>'public','uses'=>'PublicController@publicView'));

Route::get('publicPS', 'PublicController@loadPracticeSchedules');

Route::get('publicEq', 'PublicController@loadEquipments');

Route::get('publicRes', 'PublicController@loadResources');

Route::get('publicResDates/{resourceID}', 'PublicController@loadResourceFreeTimes');

Route::get('getReserveTime/{resourceName}/{date}','PublicController@getReservedTimes');

Route::get('loginView', array('as'=>'getLogin','uses'=>'MoraController@loginView'));

Route::get('in', 'MoraController@in');
Route::get('getUsers/{id}',array('as'=>'getUsers','uses'=>'MoraController@getUsersOf'));

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('login', 'MoraController@login');
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

Route::get('adminAddUser', array('as'=>'adminAddUser','uses'=>'AdminController@addNewUser'));

Route::get('adminAddSport', array('as'=>'adminAddSport','uses'=>'AdminController@addNewSport'));

Route::get('adminAddEquip',array('as'=>'adminAddEquip','uses'=>'AdminController@addNewEquipment'));

Route::get('adminAddResource',array('as'=>'adminAddResource','uses'=>'AdminController@addNewResource'));

Route::get('adminAddStudent',array('as'=>'adminAddStudent','uses'=>'AdminController@addnewStudent'));

Route::get('adminSearchUserID/{Id}','AdminController@searchUserID');

Route::get('adminSearchUserName/{name}','AdminController@searchUserName');

Route::get('adminSearchSport','AdminController@searchSport');

Route::get('adminSearchStudentID/{Id}','AdminController@searchStudentID');

Route::get('adminSearchStudentName/{name}','AdminController@searchStudentName');

Route::get('adminSearchEquipID/{Id}','AdminController@searchEquipID');

Route::get('adminSearchEquipType/{type}','AdminController@searchEquipType');

Route::get('adminLoadSports/{requester}','AdminController@loadSports');

Route::get('adminLoadResources/{requester}','AdminController@loadResources');

Route::get('adminLoadStudent/{ID}','AdminController@loadStudent');

Route::get('adminLoadUser/{ID}','AdminController@loadUser');

Route::get('adminLoadEquipment/{ID}','AdminController@loadEquip');

Route::get('adminLoadUtils/{sport}','AdminController@loadUtils');

Route::get('adminUpdateStudent',array('as'=>'adminUpdateStudent','uses'=>'AdminController@updateStudent'));

Route::get('adminUpdateUser',array('as'=>'adminUpdateUser','uses'=>'AdminController@updateUser'));

Route::get('adminResetPwd/{userId}','AdminController@resetPWD');

Route::get('admin', 'MoraController@showAdmin');

Route::get('eqprecieval',array('as'=>'eqprecieval','uses'=>'KeeperController@getEqpRc'));

Route::get('res_res',array('as'=>'res_res','uses'=>'KeeperController@getReserve'));

Route::get('eqplending',array('as'=>'eqplending','uses'=>'KeeperController@getSports'));

Route::get('eqpUpdateDetails',array('as'=>'eqpUpdateDetails','uses'=>'KeeperController@getUpDt'));

//Route::get('eqprecieval', 'KeeperController@getEqpRc');

//Route::get('res_res', 'KeeperController@getReserve');

//Route::get('eqplending', 'KeeperController@getSports');

//Route::get('eqpUpdateDetails', 'KeeperController@getUpDt');

Route::get('admin', 'MoraController@showAdmin');

Route::get('addPra', 'CoachController@addPracticeSchedule');

Route::get('displaySchedule', array('as'=>'displaySchedule','uses'=>'CoachController@displayPracticeSchedulePage'));

Route::get('displayAchieve', array('as'=>'displayAchieve','uses'=>'CoachController@displayAchievementPage'));

Route::get('addPS', array('as'=>'addPracticeSchedule','uses'=>'CoachController@addPracticeSchedule'));

Route::get('addAC', array('as'=>'addAchievement','uses'=>'CoachController@addAchievement'));

Route::get('displayDelSession', array('as'=>'displayDelSession','uses'=>'CoachController@displayDelSession'));

Route::get('deleteSession', array('as'=>'deleteSession','uses'=>'CoachController@deleteSession'));

Route::get('getRes/{sportName}', 'CoachController@getResources');

Route::get('getReserveTime/{resourceName}/{date}','CoachController@getReservedTimes');

Route::get('getStdName/{ID}','CoachController@getStdName');

Route::get('loadAchiPage', array('as'=>'loadAchiPage','uses'=>'CoachController@loadAchiPage'));

Route::get('coahHome', array('as'=>'coahHome','uses'=>'CoachController@displayCoachHome'));

Route::get('getAchList/{ID}','CoachController@loadAchievement');

Route::get('addBk', array('as'=>'addBooking','uses'=>'KeeperController@addBooking'));

Route::get('loadeqp/{sport}', 'KeeperController@loadeqp');

Route::get('chkAv/{equipment}/{sport}', 'KeeperController@checkEqpAv');

Route::get('getUpEqp/{eqpID}', 'KeeperController@getUpEqp');

Route::get('getbrlist/{stID}', 'KeeperController@getBorrowedItems');

Route::get('loadbreqp/{itemNo}', 'KeeperController@getBrDetails');

Route::get('reserveEqp/{equipment}/{studentID}', 'KeeperController@addEqpRequest');

Route::get('lendEqp', 'KeeperController@lendEquipment');

Route::get('setAv/{eqpID}', 'KeeperController@setAvailability');

Route::get('upDetails/{eqpID}/{eqpAv}/{eqpCon}', 'KeeperController@updateEq');

Route::get('getResTimes/{resourceName}/{date}','KeeperController@getReservedTimes');

Route::get('keeperHome', array('as'=>'keeperHome','uses'=>'KeeperController@displayKeeperHome'));
