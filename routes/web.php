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
Route::post('user-login','Auth\LoginController@userLogin');
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
    Route::get('dashboard', 'Admin\HomeController@dashboard')->name('admin.dashboard');

    Route::resource('events', 'Admin\EventController');
    Route::resource('videos', 'Admin\VideoController');
    Route::resource('enquiry', 'Admin\EnquiryController');
    Route::get('delete-enquiry/{id}','Admin\EnquiryController@destroy')->name('admin.delete-enquiry');
    Route::resource('columns', 'Admin\ColumnController');
});

/*
|--------------------------------------------------------------------------
| 4) User Controller
|--------------------------------------------------------------------------
*/
// Route::resource('event', 'User\EventController');
Route::resource('video', 'User\VideoController');
Route::resource('column', 'User\ColumnController');
Route::get('event','User\EventController@index')->name('event.index');
Route::get('event/{event}','User\EventController@show')->name('event.show');

Route::group(['middleware' => 'auth:user'],function ()
{
    Route::post('event','User\EventController@update')->name('event.update');
    Route::post('video','User\VideoController@index')->name('video.index');
    Route::post('video','User\VideoController@favorite')->name('video.favorite');
    Route::post('columnFavorite', 'User\ColumnController@favorite')->name('column.favorite');
});

Route::get('/wyswyg', function () {
    return view('admin.editor.editor');
});

Route::get('enquiry','EnquiryController@index');
Route::post('enquiry','EnquiryController@saveEnquiry');

//Route::get('about','AboutController@index');

Route::get('about',function () {
    return view('about');
});

/* Register with email */
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');