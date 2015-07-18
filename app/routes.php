<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*-------------------- static methods --------------------*/
Route::get('/', 'StaticController@');
Route::get('/register-user', 'StaticController@');
Route::get('/register-expert', 'StaticController@');
Route::get('/forgot-user-password', 'StaticController@');
Route::get('/forgot-expert-password', 'StaticController@');
Route::get('/contact-us', 'StaticController@');
Route::get('/about-us', 'StaticController@');


/*-------------------- authentication methods --------------------*/
Route::post('/save-user', 'AuthenticationController@');
Route::post('/save-expert', 'AuthenticationController@');
Route::post('/is-valid-expert', 'AuthenticationController@');
Route::post('/is-valid-user', 'AuthenticationController@');
Route::post('/is-valid-admin', 'AuthenticationController@');


/*-------------------- user methods --------------------*/
Route::get('/user-dashboard', 'UserController@dashboard');

Route::get('/edit-user', 'UserController@editUser');
Route::post('/update-user', 'UserController@updateUser');
Route::post('/update-picture', 'UserController@updatePicture');
Route::post('/update-password', 'UserController@updatePassword');

Route::post('/upload-document', 'UserController@uploadDocument');
Route::get('/remove-document/{id}', 'UserController@removeDocument');
Route::post('/update-picture', 'UserController@updatePicture');

Route::get('/user-appointments/{id}/{start-date?}/{end-date?}', 'UserController@userAppointments');
Route::get('/cancel-appointment/{id}', 'UserController@cancelAppointment');
Route::get('/book-appointment/{id}', 'UserController@bookAppointment');
Route::get('/get-user-appointments/{id}/{start-date?}/{end-date?}', 'UserController@getUserAppointments');
Route::get('/get-user-appointments-by-type/{id}/{appointment-type}/{start-date?}/{end-date?}', 'UserController@getUserAppointmentsByType');

Route::get('/user-documents/{id}', 'UserController@userDocuments');


/*-------------------- expert methods --------------------*/
Route::get('/expert-dashboard', 'ExpertController@dashboard');
Route::get('/expert-profile', 'ExpertController@expertProfile');
Route::get('/edit-expert', 'ExpertController@editExpert');
Route::post('/update-expert', 'ExpertController@updateExpert');
Route::post('/update-expert-picture', 'ExpertController@updatePicture');
Route::post('/update-password', 'ExpertController@updatePassword');
Route::post('/update-about', 'ExpertController@updateAbout');

Route::get('/expert-appointments/{id}/{start-date?}/{end-date?}', 'ExpertController@expertAppointments');
Route::get('/cancel-expert-appointment/{id}', 'ExpertController@cancelAppointment');
Route::get('/cancel-expert-available-appointment/{id}', 'ExpertController@cancelAvailableAppointment');

Route::get('/memberships', 'ExpertController@memberships');
Route::get('/get-memberships', 'ExpertController@getMemberships');
Route::post('/add-membership', 'ExpertController@addMembership');
Route::get('/remove-membership/{id}', 'ExpertController@removeMembership');

Route::get('/achievements', 'ExpertController@achievements');
Route::get('/get-achievements', 'ExpertController@getAchievements');
Route::post('/add-achievement', 'ExpertController@addAchievements');
Route::get('/remove-achievement/{id}', 'ExpertController@removeAchievements');

/*-------------------- institute methods --------------------*/
Route::get('/institute-dashboard', 'InstituteController@dashboard');
Route::get('/institute-profile', 'InstituteController@profile');
Route::post('/update-institute-profile', 'InstituteController@updateProfile');
Route::post('/update-picture', 'InstituteController@updatePicture');
Route::post('/update-password', 'InstituteController@updatePassword');

Route::get('/institute-experts', 'InstituteController@experts');
Route::get('/create-institute-expert', 'InstituteController@createExpert');
Route::post('/save-institute-expert', 'InstituteController@saveExpert');
Route::get('/edit-institute-expert', 'InstituteController@editExpert');
Route::post('/update-institute-expert', 'InstituteController@updateExpert');

Route::post('/set-institute-expert-appointments', 'InstituteController@setExpertAppointments');
Route::post('/save-institute-expert-appointments', 'InstituteController@saveInstituteExpertAppointments');
Route::get('/institute-appointments/{id}/{start-date?}/{end-date?}', 'InstituteController@instituteAppointments');

/*-------------------- json methods --------------------*/
Route::get('/data-get-user/{id}', 'UserController@getUser');
Route::get('/data-user-appointments/{id}/{start-date?}/{end-date?}', 'UserController@dataUserAppointments');
Route::get('/data-user-appointments-by-type/{id}/{appointment-type}/{start-date?}/{end-date?}', 'UserController@dataUserAppointmentsByType');
Route::get('/data-user-cancelled-appointments/{id}', 'UserController@dataCancelledAppointments');
Route::get('/data-user-documents/{id}', 'UserController@dataUserDocuments');

Route::get('/data-get-expert/{id}', 'ExpertController@getExpert');
Route::get('/data-expert-appointments/{id}/{start-date?}/{end-date?}', 'ExpertController@dataExpertAppointments');
Route::get('/data-expert-appointments-by-type/{id}/{appointment-type}/{start-date?}/{end-date?}', 'ExpertController@dataExpertAppointmentsByType');
Route::get('/data-expert-cancelled-appointments/{id}', 'ExpertController@dataCancelledAppointments');
Route::get('/data-get-memberships', 'ExpertController@dataGetMemberships');
Route::get('/data-get-achievements', 'ExpertController@dataGetAchievements');

Route::get('/data-get-institution/{id}', 'InstituteController@getInstitute');
Route::get('/data-institutes', 'InstituteController@dataInstitutes');
Route::get('/data-cancel-appointment-institute/{id}', 'InstituteController@dataCancelAppointment');
Route::get('/data-institute-appointments/{id}/{start-date?}/{end-date?}', 'InstituteController@dataInstituteAppointments');
Route::get('/data-institute-appointments-by-type/{id}/{appointment-type}/{start-date?}/{end-date?}', 'InstituteController@dataInstituteAppointmentsByType');
Route::get('/data-institute-cancelled-appointments/{id}', 'InstituteController@dataCancelledAppointments');
Route::get('/data-institute-experts/{id}', 'InstituteController@dataInstituteExperts');

Route::get('/data-get-event/{id}', 'EventController@getEvent');

/*-------------------- admin methods --------------------*/
Route::get('/admin-login', 'AuthenticationController@adminLogin');
Route::post('/is-valid-admin', 'AuthenticationController@isValidAdmin');
Route::get('/admin-section', 'AdminController@adminSection');

Route::get('/admin-appointments', 'AdminController@appointments');
Route::get('/admin-list-appointments/{status}/{page}', 'AdminController@listAppointments');
Route::get('/cancel-admin-appointment/{id}', 'AdminController@cancelAppointment');

Route::get('/admin-institutes', 'AdminController@institutes');
Route::get('/admin-view-institute/{id}', 'AdminController@viewInstitute');
Route::get('/admin-list-institutes/{status}/{page}', 'AdminController@listInstitutes');

Route::get('/admin-experts', 'AdminController@experts');
Route::get('/admin-view-expert/{id}', 'AdminController@viewExpert');
Route::get('/admin-list-experts/{status}/{page}', 'AdminController@listExperts');

Route::get('/admin-users', 'AdminController@users');
Route::get('/admin-view-user/{id}', 'AdminController@viewUser');
Route::get('/admin-list-users/{status}/{page}', 'AdminController@listUsers');

Route::get('/admin-software-users', 'AdminController@softwareUsers');
Route::get('/admin-list-software-users/{status}/{page}', 'AdminController@listSoftwareUsers');
Route::get('/admin-view-software-user/{id}', 'AdminController@viewSoftwareUser');
