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
Route::post('send-email', 'WelcomeController@email');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::post('section/update_all', 'SectionController@updateAll');
Route::post('cover/sort', 'CoverController@sort');
Route::resource('offer', 'OfferController');
Route::resource('client', 'ClientController');
Route::resource('education', 'EducationController');
Route::resource('work', 'WorkController');
Route::resource('user', 'UserController');
Route::resource('social', 'SocialProfileController');
Route::resource('category', 'CategoryController');
Route::resource('skill', 'SkillController');
Route::resource('project', 'ProjectController');
Route::resource('testimonial', 'TestimonialController');
Route::resource('award', 'AwardController');
Route::resource('section', 'SectionController');
Route::resource('cover', 'CoverController');
Route::resource('section-control', 'SectionControlsController');

Route::resource('blog', 'PortfolioController');