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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', ['as'=>'dashboard','uses'=>'UserController@dashboard']);

Route::get('userRegister', ['as'=>'register','uses'=>'UserController@register']);

Route::get('userShow', ['as'=>'show','uses'=>'UserController@index']);

Route::post('userStore', ['as'=>'userStore','uses'=>'UserController@store']);

Route::get('userEdit/{id}/edit', ['as'=>'userEdit','uses'=>'UserController@edit']);

Route::any('userUpdate/{id}', ['as'=>'userUpdate','uses'=>'UserController@update']);

Route::delete('userDestroy/{id}', ['as'=>'userDestroy','uses'=>'UserController@destroy']);

/*image upload*/
// Route::any('fileUpload', ['as'=>'image','uses'=>'userController@fileUpload']);

/*profile functionality*/

Route::any('userPost', ['as'=>'commentpost','uses'=>'UserController@userPost']);

Route::get('profileindex', ['as'=>'profileindex','uses'=>'UserController@profileindex']);

Route::get('userLike', ['as'=>'like','uses'=>'UserController@userLike']);

Route::get('userDislike', ['as'=>'dislike','uses'=>'UserController@userLike']);

Route::get('userLogin', ['as'=>'login','uses'=>'AuthController@login']);

/*profile functionality*/





// auth

	
	Route::any('userPostLogin', ['as'=>'Postlogin','uses'=>'AuthController@userLogin']);

	Route::get('userProfile', ['as'=>'Profile','uses'=>'AuthController@userProfile']);


	Route::get('userLogout', ['as'=>'Logout','uses'=>'AuthController@userLogout']);
//auth







