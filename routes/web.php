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
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');
//Route::resource('posts', 'PostsController')->middleware('auth');
Route::resource('posts', 'PostsController');
Route::resource('tags', 'TagsController');
Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
Route::put('restore-post/{post}','PostsController@restore')->name('restore-posts');

//Route::get('users','UsersController@index')->name('users.index');


	Route::middleware(['auth','admin'])->group(function (){
	Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
	//Route::post('api/fetch-states', 'UsersController@fetchState');


	/*---Country State City---*/
	//Route::get('dependent-dropdown', 'UsersController@fetchCountry');
	Route::post('api/fetch-states', 'UsersController@fetchState');
	Route::post('api/fetch-cities', 'UsersController@fetchCity');
	/*------------------------*/




	Route::put('users/profile','UsersController@update')->name('users.update-profile');
	Route::get('users','UsersController@index')->name('users.index');
	Route::get('user-details/{user}','UsersController@view');
	Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');
});

/*Route::get('dependent-dropdown', 'DropdownController@index');
Route::post('api/fetch-states', 'DropdownController@fetchState');
Route::post('api/fetch-cities', 'DropdownController@fetchCity');*/