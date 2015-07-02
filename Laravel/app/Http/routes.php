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

// Route ARTICOLI Rob's BLog
Route::get('articolo/{slug}', function($slug){

    $categories = \App\Category::all();

    $article = \App\Article::with('categories', 'user')->where('slug', '=', $slug)->first();

    return view('frontend.article', compact('categories', 'article'));
});


// ROUTE to AUTORE Rob's Blog
Route::get('autore/{slug}', function($slug){

    $categories = \App\Category::all();

    $author = \App\User::where('slug', '=', $slug)->first();

    $articles = $author->articles()->where('published_at', '<=', 'NOW()')->where('is_published', '=', true)->orderBy('published_at', 'DESC')->paginate(5);

    return view('frontend.author', compact('categories', 'author', 'articles'));
});


// Route CATEGORIA Rob's Blog
Route::get('categoria/{slug}', function($slug){

    $categories = \App\Category::all();

    $currentCategory = \App\Category::where('slug', '=',

        $slug)->first(); $articles = $currentCategory->articles()->where('published_at', '<=', 'NOW()')->where('is_published', '=', true)->orderBy('published_at', 'DESC')->paginate(5);

    return view('frontend.category', compact('categories', 'currentCategory', 'articles'));

});

/*

// ROUTE to Controllers/FrontendController Rob's Blog
Route::controller('frontend', 'FrontendController');




// ROUTE to Backend Rob's Blog
Route::controller('backend', 'Backend\MainController');

*/

Route::get('/backend', function () {
    return view('backend.login');
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

