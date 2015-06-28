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

/*-------------------- institute methods --------------------*/
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
Route::get('/edit-user', 'UserController@');
Route::post('/update-user', 'UserController@');
Route::post('/update-picture', 'UserController@');
Route::post('/update-password', 'UserController@');
Route::get('/user-appointments/{id}/{start-date?}/{end-date?}', 'UserController@');            // ? is for optional parameter
Route::get('/cancel-appointment/{id}', 'UserController@');
Route::get('/book-appointment/{id}', 'UserController@');


/*-------------------- expert methods --------------------*/
Route::get('/expert-dashboard', 'ExpertController@dashboard');
Route::get('/expert-profile', 'ExpertController@');
Route::get('/edit-expert', 'ExpertController@');
Route::post('/update-expert', 'ExpertController@');
Route::post('/update-expert-picture', 'ExpertController@');
Route::post('/update-password', 'ExpertController@');
Route::get('/expert-appointments/{id}/{start-date?}/{end-date?}', 'ExpertController@');            // ? is for optional parameter
Route::get('/cancel-expert-appointment/{id}', 'ExpertController@cancelAppointment');
Route::get('/cancel-expert-available-appointment/{id}', 'ExpertController@cancelAvailableAppointment');


/*-------------------- institute methods --------------------*/
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');
Route::get('/', '');

/*-------------------- json methods --------------------*/
Route::get('/data-get-user/{id}', '');
Route::get('/data-get-expert/{id}', '');
Route::get('/data-get-institution/{id}', '');

Route::get('/data-user-appointments/{id}/{start-date?}/{end-date?}', 'UserController@');
Route::get('/data-user-appointments-by-type/{id}/{appointment-type}/{start-date?}/{end-date?}', 'UserController@');
Route::get('/data-user-cancelled-appointments/{id}', 'UserController@dataCancelledAppointments');

Route::get('/data-expert-appointments/{id}/{start-date?}/{end-date?}', 'ExpertController@');
Route::get('/data-expert-appointments-by-type/{id}/{appointment-type}/{start-date?}/{end-date?}', 'ExpertController@');
Route::get('/data-expert-cancelled-appointments/{id}', 'ExpertController@dataCancelledAppointments');

Route::get('/data-institutes', 'InstituteController@');
Route::get('/data-institute-appointments/{id}/{start-date?}/{end-date?}', 'InstituteController@');
Route::get('/data-institute-experts/{id}', 'InstituteController@');


