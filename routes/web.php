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


Route::get('admin/login','AdminController@getLogin');
Route::post('admin/login','AdminController@postLogin');
Route::get('admin/dashboard','AdminController@getDashboard');
Route::get('admin/work-shop','AdminController@getWorkShop');
Route::get('admin/in-your-space','AdminController@getInYourSpace');
Route::get('admin/photo-tour','AdminController@getPhotoTour');
Route::get('admin/about-artist','AdminController@getAboutArtist');
Route::get('admin/connect','AdminController@getConnect');
Route::get('admin/add-gallery-page','AdminController@getAddGalleryPage');
Route::post('admin/add-gallery','AdminController@postAddGallery');