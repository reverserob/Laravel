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





// Route to Rob's Blog /frontend
Route::get('/frontend', function() {

  // prelevo l'elenco delle categorie per il menu...
  $categories = \App\Category::all();

  // prelevo gli articoli (includendo i dati sulle rispettive categorie ed autore associati)
  $articles = \App\Article::with('categories', 'user')->where('published_at', '<=', 'NOW()')->where('is_published', '=', true)->orderBy('published_at', 'DESC')->paginate(5);

  return view('frontend.home', ['articles' => $articles, 'categories' => $categories]);


  });





// Route to Projects /projects
Route::model('tasks', 'Task');
Route::model('projects', 'Project');
Route::bind('tasks', function($value, $route){
       return App\Task::whereSlug($value)->first();
});
Route::bind('projects', function($value, $route){
       return App\Project::whereSlug($value)->first();
});
Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');






// Route to LOGIN /auth

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

