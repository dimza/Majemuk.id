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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	
	Route::get('/', 'IndexController@index');
	
	Route::post('login', 'IndexController@postLogin');
	Route::get('logout', 'IndexController@logout');
	 
	Route::get('dashboard', 'DashboardController@index');
	
	Route::get('profile', 'AdminController@profile');
	
	Route::post('profile', 'AdminController@updateProfile');
	
	Route::post('profile_pass', 'AdminController@updatePassword');
	
	Route::get('settings', 'SettingsController@settings');
	
	Route::post('settings', 'SettingsController@settingsUpdates');
	
	Route::post('layoutsettings', 'SettingsController@layoutsettings');
	
	Route::post('addthisdisqus', 'SettingsController@addthisdisqus');
	
	Route::post('headfootupdate', 'SettingsController@headfootupdate');
	
	Route::get('categories', 'CategoriesController@categories');
	
	Route::get('categories/addcategory', 'CategoriesController@addeditCategory'); 
	Route::get('categories/addcategory/{id}', 'CategoriesController@editCategory');	
	Route::post('categories/addcategory', 'CategoriesController@addnew');
	
	Route::get('categories/delete/{id}', 'CategoriesController@delete');
	
	
	Route::get('news', 'NewsController@news');
	
	Route::get('news/addnews', 'NewsController@addeditNews');
	
	Route::post('news/addnews', 'NewsController@addnew');
	
	Route::get('news/addnews/{id}', 'NewsController@editNews');	
	
	Route::get('news/delete/{id}', 'NewsController@delete');
	
	Route::get('news/status/{id}', 'NewsController@status');
	
	Route::get('news/sliderhomepage/{id}', 'NewsController@sliderhomepage');
	
	Route::get('news/featurednews/{id}', 'NewsController@featurednews');
	
	Route::get('slidernews', 'SliderNewsController@slidernews');
	
	Route::get('featurednews', 'FeaturedNewsController@featurednews');
	
	Route::get('users', 'UsersController@userslist');
	
	Route::get('users/adduser', 'UsersController@addeditUser');
	
	Route::post('users/adduser', 'UsersController@addnew');
	
	Route::get('users/adduser/{id}', 'UsersController@editUser');
	
	Route::get('users/delete/{id}', 'UsersController@delete');	
	
	Route::get('widgets', 'WidgetsController@index');
	
	Route::post('footerwidgets', 'WidgetsController@footerWidgets');
	
	Route::post('socialmedialink', 'WidgetsController@socialmedialink');
	
	Route::post('recentpopular', 'WidgetsController@recent_popular_posts');
	
	Route::post('featuredpost', 'WidgetsController@featuredpost');
	
	Route::post('advertise', 'WidgetsController@advertise');

	Route::get('addition', 'AdditionController@index');

	Route::post('disclaimer', 'AdditionController@footerWidgets');

	Route::post('privacy', 'AdditionController@footerWidgets');

	Route::post('sitemap', 'AdditionController@footerWidgets');
	
});

Route::get('/', 'IndexController@index');

Route::get('search', 'NewsController@search');

Route::get('tags', 'NewsController@tags');

Route::get('{slug}', 'CategoryNewsController@index');

Route::get('news/{slug}', 'NewsController@index');




// Password reset link request routes...
Route::get('admin/password/email', 'Auth\PasswordController@getEmail');
Route::post('admin/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('admin/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('admin/password/reset', 'Auth\PasswordController@postReset');

 
