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
    return redirect()->route('login.index');
});

Route::get('/login','LoginController@index')->name('login.index');
Route::post('/login','LoginController@verify')->name('login.verify');
Route::get('/logout','LoginController@logout')->name('user.logout');

Route::get('/registration','registrationController@index')->name('registration.index');
Route::post('/registration','registrationController@insert')->name('registration.insert');

Route::group(['middleware'=>['AdminSess']],function(){
	Route::get('/admin','AdminController@index')->name('admin.index');

	Route::get('/admin/profile','AdminController@profile')->name('admin.profile');
	Route::post('/admin/profile','AdminController@updateProfile')->name('admin.updateProfile');

	Route::get('/admin/settings','AdminController@settings')->name('admin.settings');
	Route::post('/admin/settings','AdminController@changePassword')->name('admin.changePassword');

	Route::get('/admin/CreateEvent','eventController@CreateEvent')->name('admin.CreateEvent');
	Route::post('/admin/CreateEvent','eventController@insertEvent')->name('admin.insertEvent');
	Route::get('/admin/CurrentEvents','eventController@CurrentEvents')->name('admin.CurrentEvents');
	Route::get('/admin/deleteEvent/{id}','eventController@destroy')->name('admin.destroyEvent');
	Route::get('/admin/addEventCategory/{id}','eventController@addEventCategory')->name('admin.addEventCategory');
	Route::post('/admin/addEventCategory/{id}','eventController@insertCategory')->name('admin.insertCategory');
	Route::get('/admin/Event/{id}/edit','eventController@editEvent')->name('admin.editEvent');
	Route::post('/admin/Event/{id}/edit','eventController@updateEvent')->name('admin.updateEvent');

	Route::get('/admin/ShowAlluser','AdminController@showAlluser')->name('admin.showAlluser');
	Route::post('/admin/ShowAlluser','AdminController@searchUserByTypeId')->name('admin.searchUserByTypeId');
	Route::get('/admin/deleteUser/{id}','AdminController@destroyUser')->name('admin.destroyUser');

	Route::get('/admin/addJudge','AdminController@addJudge')->name('admin.addJudge');
	Route::post('/admin/addJudge','AdminController@insertJudge')->name('admin.insertJudge');

	Route::get('/admin/Projects','ProjectController@showProjectForAdmin')->name('admin.projects');
	Route::post('/admin/Projects','ProjectController@showProjectByEvent')->name('admin.showProjectByEvent');

	Route::get('/admin/Projects/{id}','ProjectController@viewProjectAdmin')->name('admin.viewProjectAdmin');
	Route::post('/admin/Projects/{id}','ProjectController@ProjectComment')->name('admin.ProjectComment');
});

Route::group(['middleware'=>['StudentSess']],function(){
	Route::get('/student','StudentController@index')->name('student.index');
	Route::get('/student/profile','StudentController@profile')->name('student.profile');
	Route::post('/student/profile','StudentController@updateProfile')->name('student.updateProfile');
	Route::get('/student/settings','StudentController@settings')->name('student.settings');
	Route::post('/student/settings','StudentController@changePassword')->name('student.changePassword');

	Route::get('/student/CurrentEvents','eventController@StudentCurrentEvents')->name('student.CurrentEvents');
	Route::get('/student/event/{id}/addProject','ProjectController@addProject')->name('student.addProject');
	Route::post('/student/event/{id}/addProject','ProjectController@insertProject')->name('student.insertProject');
	Route::get('/student/Project','ProjectController@showProjectForStudent')->name('student.showProjectForStudent');
	Route::get('/student/Projects/{id}','ProjectController@viewProjectStudent')->name('student.viewProjectStudent');
	Route::post('/student/Projects/{id}','ProjectController@ProjectComment')->name('project.ProjectComment');

	Route::get('/student/Projects/{id}/delete','ProjectController@destroyProject')->name('student.destroyProject');
	Route::get('/student/Projects/{id}/edit','ProjectController@editProject')->name('student.editProject');
	Route::post('/student/Projects/{id}/edit','ProjectController@updateProject')->name('student.updateProject');
});

Route::get('/judge','JudgeController@index')->name('judge.index');
Route::get('/judge/profile','JudgeController@profile')->name('judge.profile');
Route::post('/judge/profile','JudgeController@updateProfile')->name('judge.updateProfile');
Route::get('/judge/settings','JudgeController@settings')->name('judge.settings');
Route::post('/judge/settings','JudgeController@changePassword')->name('judge.changePassword');

Route::get('/judge/CurrentEvents','eventController@JudgeCurrentEvents')->name('judge.JudgeCurrentEvents');
Route::get('/judge/Event/{id}/Projects','ProjectController@viewProjectByEventJudge')->name('judge.viewProjectByEventJudge');
Route::get('/judge/Projects/{id}','ProjectController@viewProjectJudge')->name('judge.viewProjectJudge');
Route::post('/judge/Projects/{id}','ProjectController@ProjectComment')->name('judge.ProjectComment');







