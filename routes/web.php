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
    return view('top');
});

/*
|--------------------------------------------------------------------------
| 1) User login
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| 2) User login with facebook
|--------------------------------------------------------------------------
*/

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

/*
|--------------------------------------------------------------------------
| 3) Admin login
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});


/*
|--------------------------------------------------------------------------
| 4) Admin Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');

    Route::resource('events', 'Admin\EventController');
    Route::resource('videos', 'Admin\VideoController');

});

/*
|--------------------------------------------------------------------------
| 4) User Controller
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth:user'],function ()
{
    Route::resource('event', 'User\EventController');
    Route::resource('video', 'User\VideoController');
});

Route::get('/wyswyg', function () {
    return view('admin.editor.editor');
});