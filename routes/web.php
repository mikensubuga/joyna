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


// Route::group(['middleware' => ['admin']], function () {
//     Route::get('/admin', function(){
//         return view('admin.index');
//     })->name('admin.index');
// });
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/admin', function(){
       return view('admin.index');
    })->name('admin.index');


    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::get('admin/media/','AdminMediaController@index')->name('media.index');
    Route::post('media-store','AdminMediaController@store')->name('media.store');

    Route::get('admin/media/upload','AdminMediaController@upload')->name('media.upload');
    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');




});