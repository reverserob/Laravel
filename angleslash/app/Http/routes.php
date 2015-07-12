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

// We use the Laravel built in Auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
//----------------------------------------//

// Display users, subs and front page
Route::get('/', 'PostController@frontpage');
Route::get('u/{user}', 'UserController@show');
Route::get('r/{sub}', 'SubController@show');
//----------------------------------------//

// Checking if the user is signed in (using AJAX)
Route::get('authcheck', function () {
    return json_encode(Auth::check());
});
//----------------------------------------//

// Creating and storing a new sub
Route::get('sub/new', [
    'middleware' => 'auth',
    'uses' => 'SubController@displayform'
]);

Route::post('sub/new', [
    'middleware' => 'auth',
    'uses' => 'SubController@storesub'
]);
//----------------------------------------//

// Creating and storing a new post / link
Route::get('post/new', [
    'middleware' => 'auth',
    'uses' => 'PostController@displayform',
]);

Route::post('post/new', [
    'middleware' => 'auth',
    'uses' => 'PostController@storepost'
]);
//----------------------------------------//

// Voting on posts / links
Route::post('vote', [
    'middleware' => 'auth',
    'uses' => 'VoteController@vote'
]);