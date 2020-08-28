<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('public');
});
Route::group(['prefix' => 'public'], function () {
    Route::get('/', [
        'as' => 'Home',
        'uses' => "Publics\PublicController@showHome"
    ]);
    Route::get('/about', [
        'as' => 'About',
        'uses' => "Publics\PublicController@showAbout"
    ]);
    Route::get('/blog', [
        'as' => 'Blog',
        'uses' => "Publics\PublicController@showBlog"
    ]);
    Route::get('/contact', [
        'as' => 'Contact',
        'uses' => "Publics\PublicController@showContact"
    ]);
    Route::get('/login', [
        'as' => 'Login',
        'uses' => "Publics\PublicController@showLogin"
    ]);
});
Route::group(['prefix' => 'private'], function () {
    Route::group(['prefix' => 'infoAccount'], function () {
        Route::get('/', [
            'as' => 'AccountInfo',
            'uses' => 'Privates\PrivateController@showInfoAccount'
        ]);
        Route::get('/detail/{theIDAccount}', [
            'as' => 'DetailAccountInfo',
            'uses' => 'Privates\PrivateController@showDetailInfoAccount'
        ]);
    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', [
            'as' => 'Report',
            'uses' => 'Privates\PrivateController@showReport'
        ]);
    });
    Route::group(['prefix' => 'support'], function () {
        Route::get('/', [
            'as' => 'Support',
            'uses' => 'Privates\PrivateController@showSupport'
        ]);
    });

    Route::group(['prefix' => 'history'], function () {
        Route::get('/', [
            'as' => 'History',
            'uses' => 'Privates\PrivateController@showHistory',
        ]);
        Route::get('/history/{theIDTransaction}', [
            'as' => 'DetailHistory',
            'uses' => 'Privates\PrivateController@showDetailHistory'
        ]);
    });

});
