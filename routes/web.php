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
})->name('home');


Route::post('/signup', 'UserController@postSignUp')->name('signup');
Route::post('/signin', 'UserController@postSignIn')->name('signin');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'PostController@getDashboard')->name('dashboard');
    Route::post('/createpost', 'PostController@postCreatePost')->name('create.post');
    Route::post('/edit', 'PostController@postEditPost')->name('edit');
    Route::get('/delete-post/{post_id}', 'PostController@getDeletePost')->name('delete.post');
    Route::get('/logout', 'UserController@getLogout')->name('logout');
    Route::get('/account', 'UserController@getAccount')->name('account');
    Route::post('/update-account', 'UserController@postSaveAccount')->name('account.save');
    Route::get('/user-image/{filename}', 'UserController@getUserImage')->name('account.image');
    Route::post('/like', 'PostController@postLikePost')->name('like');
});


