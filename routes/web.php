<?php

//User
Route::get('/','UsersController@getHome');
Route::get('gallery-category','UsersController@getGalleryCategory');
Route::get('gallery','UsersController@getGallery');
Route::get('gallery-inner','UsersController@getGalleryInner');


Route::get('work-shop','UsersController@getWorkShop');

Route::get('work-shop-inner','UsersController@getWorkShopInner');

Route::get('work-shop-inner','UsersController@getInYourSpace');
Route::get('photo-tour','UsersController@gerPhotoTour');
Route::get('about-artist','UsersController@getAboutArtist');
Route::get('connect','UsersController@getConnect');








//Admin
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
Route::get('admin/logout','AdminController@getLogout');
Route::get('admin/home','AdminController@getHome');
Route::post('admin/add-partners','AdminController@postAddPartners');
Route::get('admin/partners-delete/{id}','AdminController@getPartnersDelete');
Route::post('admin/home-bg','AdminController@postHomeBg');
Route::get('admin/delete-home-bg/{id}','AdminController@getDeleteHomeBg');
