<?php

//User
Route::get('/','UsersController@getHome');
Route::get('gallery-images-category','UsersController@getGalleryCategory');
Route::get('gallery-images','UsersController@getGallery');
Route::get('gallery-images-inner','UsersController@getGalleryInner');


Route::get('work-shop','UsersController@getWorkShop');

Route::get('work-shop-inner','UsersController@getWorkShopInner');

Route::get('in-your-space','UsersController@getInYourSpace');
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
Route::get('admin/add-gallery-images-page','AdminController@getAddGalleryPage');
Route::post('admin/add-gallery-images','AdminController@postAddGallery');
Route::get('admin/logout','AdminController@getLogout');
Route::get('admin/home','AdminController@getHome');
Route::post('admin/add-partners','AdminController@postAddPartners');
Route::get('admin/partners-delete/{id}','AdminController@getPartnersDelete');
Route::post('admin/home-bg','AdminController@postHomeBg');
Route::get('admin/delete-home-bg/{id}','AdminController@getDeleteHomeBg');
Route::post('admin/add-home-gallery-images','AdminController@postAddHomeGallery');
Route::get('admin/edit-home-gallery/{id}','AdminController@getEditHomeGallery');
Route::post('admin/edit-home-gallery','AdminController@postEditHomeGallery');
Route::get('admin/delete-home-gallery/{id}','AdminController@getDeleteHomeGallery');
Route::post('admin/update-favourite','AdminController@postUpdateFavourite');
Route::post('admin/add-in-your-space-background','AdminController@postAddInYourSpaceBackground');
Route::get('admin/edit-in-your-space/{id}','AdminController@getEditInYourSpace');
Route::post('admin/edit-background','AdminController@postEditBackground');
Route::get('admin/Deletein-your-space/{id}','AdminController@getDeleteInYourSpace');
Route::post('admin/in-your-space-images','AdminController@postInYourSpaceImages');
Route::get('admin/delete-in-your-space-images/{id}','AdminController@getDeleteInYourSpaceImages');
Route::get('admin/edit-in-your-space-images/{id}','AdminController@getEditInYourSpaceImages');
Route::post('admin/edit-in-your-space-images','AdminController@postEditInYourSpaceImages');
