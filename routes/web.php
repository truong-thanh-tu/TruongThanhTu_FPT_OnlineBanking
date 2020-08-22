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

Route::group(['prefix' => ''], function () {
    Route::get('', ['as' => 'Login', 'uses' => 'Login\loginController@getFormLogin']);
});
Route::group(['prefix' => 'page'], function () {

    Route::group(['prefix' => 'information'], function () {
        Route::get('informationCustomer', ['as' => 'InformationCustomer', 'uses' => 'Page\informationController@getInformationCustomer']);
    });

    Route::group(['prefix' => 'change'], function () {
        Route::get('changePassword', ['as' => 'ChangePassword', 'uses' => 'Page\changeController@getChangePassword']);
    });

    Route::group(['prefix' => 'method'], function () {
        Route::get('methodHeardOTP', ['as' => 'MethodHeardOTP', 'uses' => 'Page\methodController@getMethodHeardOTP']);
    });

    Route::group(['prefix' => 'list'], function () {
        Route::get('listOfBeneficiaries', ['as' => 'ListOfBeneficiaries', 'uses' => 'Page\listController@getListOfBeneficiaries']);
    });
    Route::group(['prefix' => 'limit'], function () {
        Route::get('transferLimit', ['as' => 'TransferLimit', 'uses' => 'Page\transferController@getTransferLimit']);
    });
});
Route::group(['prefix' => 'transfer'], function () {
    Route::group(['prefix' => 'in'], function () {
        Route::get('bank', ['as' => 'InTransferBank', 'uses' => 'Transfer\inBankController@getInTransferBank']);
        Route::get('confirm', ['as' => 'ConfirmInTransferBank', 'uses' => 'Transfer\inBankController@getConfirmInTransferBank']);
        Route::get('enter', ['as' => 'EnterCodeOPT', 'uses' => 'Transfer\inBankController@getEnterCodeOPT']);
        Route::get('success', ['as' => 'SuccessTransfer', 'uses' => 'Transfer\inBankController@getSuccessTransfer']);
    });
});
Route::group(['prefix' => 'information'], function () {
    Route::get('informationAccount',[
        'as'=>'InformationAccount',
        'uses'=>'Information\informationAccount@getInformationAccount',
    ]);
    Route::get('detailInformationAccount/{id}',[
        'as'=>'DetailInformationAccount',
        'uses'=>'Information\informationAccount@getDetailInformationAccount',
    ]);
});
