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
Route::get('/', 'StaticController@home');
Route::get('/register-user', 'StaticController@registerUser');
Route::get('/register-expert', 'StaticController@registerExpert');
Route::get('/forgot-user-password', 'StaticController@forgotUserPassword');
Route::get('/forgot-expert-password', 'StaticController@forgotExpertPassword');
Route::get('/contact-us', 'StaticController@contactUs');
Route::get('/about-us', 'StaticController@aboutUs');
Route::get('/search-cities/{key}', 'StaticController@searchCities');
Route::get('/search-keyword/{key}/{city?}', 'StaticController@searchByKeyword');
Route::get('/get-cities/{state}', 'StaticController@getCities');

Route::get('/expert-login', 'StaticController@expertLogin');

/*-------------------- data pages methods --------------------*/
Route::get('/expert/{id}', 'StaticController@expert');
Route::get('/experts/{city?}/{keyword?}', 'StaticController@experts');

/*-------------------- authentication methods --------------------*/
Route::post('/save-user', 'AuthenticationController@');
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
Route::get('/remove-expert-membership/{id}', 'ExpertController@removeMembership');

Route::get('/achievements', 'ExpertController@achievements');
Route::get('/get-achievements', 'ExpertController@getAchievements');
Route::post('/add-achievement', 'ExpertController@addAchievements');
Route::get('/remove-expert-achievement/{id}', 'ExpertController@removeAchievements');

Route::get('/achievements', 'ExpertController@achievements');
Route::get('/get-achievements', 'ExpertController@getAchievements');
Route::post('/add-achievement', 'ExpertController@addAchievements');
Route::get('/remove-expert-achievement/{id}', 'ExpertController@removeAchievements');

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
Route::get('/data-expert-list-memberships/{id}/{page?}', 'ExpertController@dataListMemberships');
Route::get('/data-expert-list-achievements/{id}/{page?}', 'ExpertController@dataListAchievements');
Route::get('/data-expert-list-services/{id}/{page?}', 'ExpertController@dataListServices');
Route::get('/data-expert-list-specialties/{id}/{page?}', 'ExpertController@dataListSpecialties');
Route::get('/data-expert-list-social/{id}/{page?}', 'ExpertController@dataListSocial');
Route::get('/data-expert-list-qualification/{id}/{page?}', 'ExpertController@dataListQualification');

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
Route::get('/admin-view-appointment/{id}', 'AdminController@viewAppointment');
Route::get('/cancel-admin-appointment/{id}', 'AdminController@cancelAppointment');

Route::get('/admin-users', 'AdminController@users');
Route::get('/admin-view-user/{id}', 'AdminController@viewUser');
Route::get('/admin-list-users/{status}/{page}', 'AdminController@listUsers');

Route::get('/admin-get-cities/{state}', 'AdminController@getCities');

Route::get('/admin-software-users', 'AdminController@softwareUsers');
Route::get('/admin-list-software-users/{status}/{page}', 'AdminController@listSoftwareUsers');
Route::get('/admin-view-software-user/{id}', 'AdminController@viewSoftwareUser');

Route::get('/admin-locations', 'AdminController@locations');
Route::get('/admin-list-locations/{status}/{page}', 'AdminController@listLocations');
Route::get('/remove-location/{id}', 'AdminController@removeLocation');
Route::post('/save-location', 'AdminController@saveLocation');

Route::get('/remove-expert-membership-admin/{id}', 'AdminController@removeExpertMembership');
Route::get('/remove-expert-service-admin/{id}', 'AdminController@removeExpertService');
Route::get('/remove-expert-achievement-admin/{id}', 'AdminController@removeExpertAchievement');
Route::get('/remove-expert-social-admin/{id}', 'AdminController@removeExpertSocial');
Route::get('/remove-expert-specialty-admin/{id}', 'AdminController@removeExpertSpecialty');
Route::get('/remove-expert-qualification-admin/{id}', 'AdminController@removeExpertQualification');

Route::get('/remove-institute-membership-admin/{id}', 'AdminController@removeInstituteMembership');
Route::get('/remove-institute-service-admin/{id}', 'AdminController@removeInstituteService');
Route::get('/remove-institute-achievement-admin/{id}', 'AdminController@removeInstituteAchievement');
Route::get('/remove-institute-social-admin/{id}', 'AdminController@removeInstituteSocial');
Route::get('/remove-institute-specialty-admin/{id}', 'AdminController@removeInstituteSpecialty');

Route::get('/admin-experts', 'AdminController@experts');
Route::get('/admin-view-expert/{id}', 'AdminController@viewExpert');
Route::get('/admin-list-experts/{status}/{page}', 'AdminController@listExperts');
Route::post('/save-admin-expert', 'AdminController@saveExpert');
Route::post('/update-admin-expert', 'AdminController@updateExpert');
Route::post('/create-expert-membership-admin', 'AdminController@createExpertMembership');
Route::post('/create-expert-service-admin', 'AdminController@createExpertService');
Route::post('/create-expert-achievement-admin', 'AdminController@createExpertAchievement');
Route::post('/create-expert-social-admin', 'AdminController@createExpertSocial');
Route::post('/create-expert-specialty-admin', 'AdminController@createExpertSpecialty');
Route::post('/create-expert-qualification-admin', 'AdminController@createExpertQualification');

Route::get('/admin-institutes', 'AdminController@institutes');
Route::get('/admin-view-institute/{id}', 'AdminController@viewInstitute');
Route::get('/admin-list-institutes/{status}/{page}', 'AdminController@listInstitutes');
Route::post('/save-institute-admin', 'AdminController@saveInstitute');
Route::post('/update-institute-admin', 'AdminController@updateInstitute');
Route::post('/create-institute-membership-admin', 'AdminController@createInstituteMembership');
Route::post('/create-institute-service-admin', 'AdminController@createInstituteService');
Route::post('/create-institute-achievement-admin', 'AdminController@creatInstituteAchievement');
Route::post('/create-institute-social-admin', 'AdminController@createInstituteSocial');
Route::post('/create-institute-specialty-admin', 'AdminController@createInstituteSpecialty');

Route::get('/admin-categories', 'AdminController@manageCategories');
Route::get('/admin-list-categories/{status}', 'AdminController@listCategories');
Route::get('/admin-list-subcategories/{id}/{status}', 'AdminController@listSubcategories');
Route::post('/save-category', 'AdminController@saveCategory');
Route::post('/update-category', 'AdminController@updateCategory');
Route::post('/save-subcategory', 'AdminController@saveSubCategory');
Route::post('/update-subcategory', 'AdminController@updateSubCategory');
Route::get('/remove-category/{id}', 'AdminController@removeCategory');
Route::get('/remove-subcategory/{id}', 'AdminController@removeSubCategory');