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
    Route::get('/Home/{id}', [
        'as' => 'Introduce',
        'uses' => "Publics\PublicController@showIntroduce"
    ]);

    Route::get('/about', [
        'as' => 'About',
        'uses' => "Publics\PublicController@showAbout"
    ]);

    Route::get('/news', [
        'as' => 'Blog',
        'uses' => "Publics\PublicController@showBlog"
    ]);
    Route::get('/news/{id}', [
        'as' => 'Blog-Detail',
        'uses' => "Publics\PublicController@showBlogDetail"
    ]);
    Route::get('/contact', [
        'as' => 'Contact',
        'uses' => "Publics\PublicController@showContact"
    ]);
    Route::post('/contactMessage', [
        'as' => 'ContactMessage',
        'uses' => "Publics\PublicController@postContact"
    ]);

    /**
     * Login
     */
    Route::get('/login', [
        'as' => 'Login',
        'uses' => "Publics\PublicController@showLogin"
    ]);
    Route::post('/login', [
        'as' => 'Login',
        'uses' => "Publics\PublicController@handlingLogin"
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
        Route::get('/{checkOutCode}', [
            'as' => 'PDFReport',
            'uses' => 'Privates\PrivateController@printReport'
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
    Route::group(['prefix' => 'transaction'], function () {

        Route::group(['prefix' => 'InSystem'], function () {

            Route::get('/', [
                'as' => 'GetInfoTransactionInSystem',
                'uses' => 'Privates\PrivateController@showTransactionInSystem'
            ]);
            Route::post('/handlingInfoTransactionInSystem', [
                'as' => 'PostInfoTransactionInSystem',
                'uses' => 'Privates\PrivateController@postTransactionInSystem'
            ]);

            Route::get('/confirm', [
                'as' => 'confirmInfoTransactionInSystem',
                'uses' => 'Privates\PrivateController@showConfirmInfoTransactionInSystem'
            ]);

            Route::get('/receive', [
                'as' => 'receiveOTPInSystem',
                'uses' => 'Privates\PrivateController@showReceiveCodeOTPInSystem'
            ]);

            Route::post('/alerts', [
                'as' => 'alertsSuccessTransactionInSystem',
                'uses' => 'Privates\PrivateController@showAlertsSuccessTransactionInSystem'
            ]);
        });
        Route::group(['prefix' => 'OutSystem'], function () {

            Route::get('/', [
                'as' => 'GetInfoTransactionOutSystem',
                'uses' => 'Privates\PrivateController@showTransactionOutSystem'
            ]);

            Route::post('/confirm', [
                'as' => 'confirmInfoTransactionOutSystem',
                'uses' => 'Privates\PrivateController@postConfirmInfoTransactionOutSystem'
            ]);

            Route::post('/receive', [
                'as' => 'receiveOTPOutSystem',
                'uses' => 'Privates\PrivateController@postReceiveCodeOTPOutSystem'
            ]);

            Route::post('/alerts', [
                'as' => 'alertsSuccessTransactionOutSystem',
                'uses' => 'Privates\PrivateController@showAlertsSuccessTransactionOutSystem'
            ]);
        });
    });
    Route::get('logout',[
        'as'=>'Logout',
        'uses'=>'Privates\PrivateController@logout'
    ]);
});


