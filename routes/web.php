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



Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {

        return view('welcome');

    })->name('home')->middleware('guest');



    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);


    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as'=>'dashboard',
        'middleware' => 'auth_login'
    ]);

    Route::get('/temp', [
        'uses' => 'PostController@getTemp',
        'as' => 'temp'
    ]);

    Route::post('/CreatePost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'CreatePost'
    ]);

    Route::get('/DeletePost/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'DeletePost',
        'middleware'=>'auth_login'
    ]);

    Route::get('/Logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'Logout'
    ]);


    Route::post('/edit', [
        'uses'=>'PostController@postEditPost',
        'as'=>'edit'
    ]);

    Route::get('/account', [
        'uses'=>'UserController@getAccount',
        'as'=>'account'
    ]);

    Route::post('/updateaccount', [
        'uses'=>'UserController@postSaveAccount',
        'as'=>'account.save'
    ]);

    Route::get('/userimage/{filename}', [
        'uses'=>'UserController@getUserImage',
        'as'=>'account.image'
    ]);



});