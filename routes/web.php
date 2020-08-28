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
Route::get('/',function (){
    return redirect('public');
});
Route::group(['prefix'=>'public'],function (){
    Route::get('/',[
        'as'=>'Home',
        'uses'=>"Publics\PublicController@showHome"
    ]);
    Route::get('/about',[
        'as'=>'About',
        'uses'=>"Publics\PublicController@showAbout"
    ]);
    Route::get('/blog',[
        'as'=>'Blog',
        'uses'=>"Publics\PublicController@showBlog"
    ]);
    Route::get('/contact',[
        'as'=>'Contact',
        'uses'=>"Publics\PublicController@showContact"
    ]);
});
