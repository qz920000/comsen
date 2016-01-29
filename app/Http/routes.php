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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('', 'PagesController@home');
//Route::get('/', 'PagesController@home');
//Route::get('/home', 'PagesController@home');

///*********************REGISTRATION/LOGIn section**************************/////////////////////
Route::get('users/register', 'Auth\AuthController@getRegister')->name('register');
Route::post('users/register', 'Auth\AuthController@postRegister');
Route::get('register/verify/{activationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\AuthController@confirm'
]);

Route::get('users/login', 'Auth\AuthController@getLogin')->name('login');
Route::post('users/login', 'Auth\AuthController@postLogin');
//Route::post('users/login', 'Auth\SessionsController@postLogin');
Route::get('users/logout', 'Auth\AuthController@getLogout')->name('logout');

//Route::get('login', 'SessionController@login');
//Route::post('login', 'SessionController@postLogin');
//Route::get('logout', 'SessionController@logout');
Route::get('sendlink/{email}', 'Auth\AuthController@send_verification')->name('getlink');
//Route::get('emails/sendverify/{id}', 'Auth\AuthController@send_verification')->name('getlink');
Route::post('sendlink', 'Auth\AuthController@send_verification_action')->name('send_link');
Route::controllers(['password' => 'Auth\PasswordController',]);
Route::get('password/email', 'Auth\PasswordController@dummy')->name('get_reset_password');
Route::get('password/reset', 'Auth\PasswordController@dummy')->name('post_reset_password');
//Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 
//'manager'), function () {
//Route::get('users', 'UsersController@index');
//});

//Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
//Route::get('users', 'UsersController@index');
//});
Route::post('/userprofile/{name?}','ContactController@sendEmailtoUser');
Route::get('/userprofile/{name?}', 'UsersController@show')->name('userprofile');
Route::get('users/{id?}/edit', 'UsersController@edit')->name('useredit');
Route::post('users/{id?}/edit','UsersController@update')->name('userupdate');
///*********************ADMIN DASHBOARD section**************************/////////////////////
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
Route::get('users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
Route::get('roles', 'RolesController@index')->name('roles_home');
Route::get('roles/create', 'RolesController@create');
Route::post('roles/create', 'RolesController@store');
Route::get('users/{id?}/edit', 'UsersController@edit');
Route::post('users/{id?}/edit','UsersController@update');
//Route::get('/', 'PagesController@home');
Route::get('/', ['as' => 'adminhome', 'uses' => 'PagesController@home']);
//Route::get('posts', 'PostsController@index');
//Route::get('posts/create', 'PostsController@create');
//Route::post('posts/create', 'PostsController@store');
//Route::get('posts/{id?}/edit', 'PostsController@edit');
//Route::post('posts/{id?}/edit','PostsController@update');
Route::get('categories', 'CategoriesController@index')->name('category_home');
Route::get('categories/create', 'CategoriesController@create')->name('create_category');
Route::post('categories/create', 'CategoriesController@store');
});

///*********************posts..blog section**************************/////////////////////
Route::get('posts', 'PostsController@index')->name('post_home');
Route::get('posts/create', 'PostsController@create')->name('create_post');
Route::post('/posts/create', 'PostsController@savepost')->name('savepost');
//Route::post('/posts/create', 'PostsController@publish')->name('publish');

Route::get('/posts/{slug?}/preview', 'PostsController@showPreview')->name('preview');
//Route::post('posts/{id?}/preview', 'PostsController@storeFinal')->name('saveFinal');
Route::get('posts/{id?}', 'PostsController@storeFinal')->name('saveFinal');
Route::get('posts/{id?}/edit', 'PostsController@edit');
Route::post('posts/{id?}/edit','PostsController@update');

Route::get('posts/user/myposts', 'PostsController@showMyPosts')->name('mypost');
Route::get('posts/user/mydrafts', 'PostsController@showMyDrafts')->name('mydraft');
Route::get('posts/user/mycomments', 'PostsController@showComments')->name('mycomments');

Route::get('posts/{id?}/updateposts', 'UpdatePostsController@updatePost')->name('updatepost');//->middleware ('auth');
Route::post('posts/updateposts', 'UpdatePostsController@newUpdate')->name('updateposts');

//Route::get('posts/{username?}', 'PostsController@myposts'); 'middleware' => 'auth',
//Route::get('posts/{username?}', 'PostsController@show2');
//Route::get('posts/usera/myposts', 'PostsController@show')->name('myposts');

//Route::get('posts/user/myposts', 'PostsController@show')->name('mypost');

//Route::get('posts/{id?}/edit2', 'PostsController@edit2');
//Route::get('posts/{username?}/edit3', 'PostsController@edit3');

//Route::get('categories', 'CategoriesController@index')->name('category_home');
//Route::get('categories/create', 'CategoriesController@create')->name('create_category');
//Route::post('categories/create', 'CategoriesController@store');
//Route::get('users', 'UsersController@index');

//Route::get('/about', 'PagesController@about');

//Route::get('/contacts', 'PagesController@contact');
//Route::get('../contact', 'PagesController@contact');


///*********************General menu Section**************************/////////////////////
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);
//Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);


Route::get('/search', 'PagesController@search')->name('search');
Route::get('/contact2', ['as' => 'contact2', 'uses' => 'PagesController@contact2']);
///*********************blogs and comments Section**************************/////////////////////
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog2', 'BlogController@index2')->name('blog2');
//Route::get('/blog/{slug?}', 'BlogController@show2');
Route::get('/blog/{id?}', 'BlogController@show')->name('singleblog');

Route::post('/blog/{id?}', 'CommentsController@newComment')->name('comment');



///*********************images and file uploads Section**************************/////////////////////
//codetuts
Route::get('fileentry', 'FileEntryController@index')->name('fileentry');
Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[ 
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);

//devartisan
//'action'=>'ImageController@store',
Route::get('imageUploadForm', 'ImageController@upload' )->name('uploadform'); //devartisan
Route::post('imageUploadForm', 'ImageController@store' )->name('storeimage');
Route::get('showlists', 'ImageController@show' )->name('showimage');

Route::post('posts22', 'ImageController@storeimage' )->name('uploadimage'); 
//Route::get('showlist', function() )->name('listimage');
Route::get('/images/{id?}', ['as' => 'listimage']);
Route::get('posts/{id?}/deleteimage', 'ImageController@destroy2')->name('deleteimage');//->middleware ('auth');
//Route::get('posts/{id?}/edit', 'PostsController@edit');
//Route::get('posts/{id?}/updateposts', 'ImageController@destroy')->name('deleteimage');
//<a href="{!! action('ImageController@destroy()'), $image->id !!}">Delete Image {{$image->id}}</a>

///*********************errors Section**************************/////////////////////
Route::get('errors/unauthorized', 'BlogController@unauthorized')->name('unauthorized');

///*********************otherss Section**************************/////////////////////
Route::post('/contact', ['as' => 'contact', 'uses' => 'ContactController@store']);