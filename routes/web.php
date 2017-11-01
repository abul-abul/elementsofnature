<?php

//User
Route::get('/','UsersController@getHome');

//Gallery
Route::get('gallery-images-category','UsersController@getGalleryCategory');
Route::get('gallery-images/{id}','UsersController@getGalleryCategoryImages');
Route::get('gallery-images-inner/{id}','UsersController@getGalleryInner');
Route::get('images-inner-frame/{id}','UsersController@getImagesInnerFrame');
//End gallery

Route::get('work-shop','UsersController@getWorkShop');

Route::get('work-shop-inner/{id}','UsersController@getWorkShopInner');

Route::get('in-your-space','UsersController@getInYourSpace');
Route::get('photo-tour','UsersController@gerPhotoTour');
Route::get('about-artist','UsersController@getAboutArtist');
Route::get('connect','UsersController@getConnect');
Route::post('user/connect','UsersController@postConnect');



//News
Route::get('user/news-inner/{id}','UsersController@getNewsInner');

//end news

//payments
Route::get('paypal','PaymentController@getPayPal');
Route::get('paypal-cancel','PaymentController@getPaypalCancelResponse');
Route::get('paypal-response','PaymentController@getPaypalReturnResponse');
Route::get('pay-page/{id}','PaymentController@getPayPage');
//endpayments








//Admin

Route::get('admin/login','AdminController@getLogin');
Route::post('admin/login','AdminController@postLogin');
Route::get('admin/dashboard','AdminController@getDashboard');
Route::get('admin/work-shop','AdminController@getWorkShop');
Route::get('admin/in-your-space','AdminController@getInYourSpace');
Route::get('admin/photo-tour','AdminController@getPhotoTour');
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
Route::post('admin/in-your-space-text','AdminController@postInYourSpaceText');
Route::get('admin/delete-in-your-space-text/{id}','AdminController@getDeleteInYourSpaceText');


Route::post('admin/add-footer-background','AdminController@postAddFooterBackground');
Route::get('admin/delete-footer-bacground/{id}','AdminController@getDeleteFooterBacground');


//Gallery Categorys
Route::get('admin/gallery-category','AdminController@getGalleryCategory');
Route::post('admin/gallery-category','AdminController@postAddGalleryCategory');
Route::get('admin/edit-gallery-category/{id}','AdminController@getEditGalleryCategory');
Route::post('admin/edit-gallery-category','AdminController@postEditGalleryCategory');
Route::get('admin/delete-gallery-category/{id}','AdminController@getDeleteGalleryCategory');


//Gallery Categorys Images
Route::get('admin/gallery-category-images/{id}','AdminController@getGalleryCategoryImages');
Route::get('admin/add-gallery-category-images/{id}','AdminController@getAddGalleryCategoryImages');

Route::post('admin/gallery-category-images','AdminController@postAddGalleryCategoryImages');
Route::post('admin/gallery-category-inner-images','AdminController@postAddGalleryCategoryInner');
Route::post('admin/update-gallery-category-images-favourite/{id}','AdminController@getUpdateGalleryCategoryImagesFavourite');
Route::post('admin/update-futered-images/{id}','AdminController@getUpdateFuteredImages');

Route::get('admin/edit-gallery-category-images/{id}','AdminController@getEditGalleryCategoryImages');
Route::post('admin/edit-gallery-category-images','AdminController@postEditGalleryCategoryImages');
Route::get('admin/view-gallery-category-img-inner/{id}','AdminController@getViewGalleryCategoryImgInner');

Route::get('admin/add-gallery-category-img-inner-page/{id}','AdminController@getAddGalleryImgInnerPage');
Route::post('admin/add-gallery-category-img-inner-page/','AdminController@postAddCatImgInner');
Route::get('admin/add-frame-page/{id}/{frame_id}','AdminController@getAddFramePage');
Route::post('admin/add-img-frame','AdminController@postAddImgFrame');

Route::get('admin/edit-gallery-category-images-inner/{id}/{id1}','AdminController@getEditGalleryCategoryImagesInner');
Route::post('admin/edit-gallery-category-images-inner','AdminController@postEditGalleryCategoryImagesInner');
Route::get('admin/delete-gallery-category-images-inner/{id}','AdminController@getDeleteGalleryCategoryImagesInner');

Route::get('admin/edit-frames/{id}','AdminController@getEditFrames');

Route::post('admin/edit-img-frame','AdminController@postEditFrames');

Route::get('admin/delee-img-frame/{id}','AdminController@getDeleteImgFrame');

Route::get('admin/delete-gallery-category-images/{id}','AdminController@getDeleteGalleryCategoryImages');
Route::post('admin/add-gallery-category-images-background','AdminController@postAddGalleryCategoryImagesBackground');

Route::post('admin/add-cat-images-inner-top','AdminController@postAddCatImagesInnerTop');
Route::get('admin/delete-gallery-category-images-inner-top/{id}','AdminController@getDeleteGalCatImgInnerTop');


//Work shop
Route::get('admin/add-work-shop','AdminController@getAddWorkShop');
Route::post('admin/add-work-shop','AdminController@postAddWorkShop');
Route::get('admin/edit-work-shop/{id}','AdminController@getEditWorkShop');
Route::post('admin/edit-work-shop','AdminController@postEditWorkShop');
Route::get('admin/delete-work-shop/{id}','AdminController@getDeleteWorkShop');
Route::post('admin/add-work-shop-background-top','AdminController@postAddWorkShopBackgroundTop');
Route::get('admin/edit-worl-shop-background/{id}','AdminController@getEditWorkShopBackgrount');



//Photo Tour
Route::get('admin/add-photo-tour','AdminController@getAddPhotoTour');
Route::get('admin/edit-photo-tour/{id}','AdminController@getEditPhotoTour');
Route::get('admin/delete-photo-tour/{id}','AdminController@getDeletePhotoTour');
Route::post('admin/add-photo-tour','AdminController@postAddPhotoTour');
Route::post('admin/edit-photo-tour','AdminController@postEditPhotoTour');
Route::post('admin/add-pohot-tour-background-top','AdminController@postAddPhotoTourBackgroundTop');
Route::get('admin/edit-photo-tour-background/{id}','AdminController@getEditPhotoTourBackground');


//Connect
Route::post('admin/add-connect-background-top','AdminController@postAddConnectBackgroundTop');
Route::get('admin/edit-connect-background/{id}','AdminController@getEditConnectBackground');
Route::get('admin/delete-connect/{id}','AdminController@getDeleteConnect');


//About Artist
Route::get('admin/about-artist','AdminController@getAboutArtist');
Route::post('admin/add-about','AdminController@postAddAbout');
Route::get('admin/edit-about/{id}','AdminController@getEditAbout');
Route::post('admin/edit-about','AdminController@postEditAbout');
Route::get('admin/delete-about/{id}','AdminController@getDeleteAbout');

//News
Route::get('admin/news','AdminController@getNews');
Route::post('admin/add-news','AdminController@postAddNews');
Route::get('admin/edit-news/{id}','AdminController@getEditNews');
Route::post('admin/edit-news','AdminController@postEditNews');
Route::get('admin/delete-news/{id}','AdminController@getDeleteNews');
Route::get('admin/news-favourite/{id}','AdminController@getUpdateNewsFavourite');
Route::get('admin/news-gallery/{id}','AdminController@getNewsGallery');
Route::post('admin/add-news-gallery','AdminController@postAddNewsGallery');
Route::get('admin/delete-news-gallery/{id}','AdminController@getDeleteNewsGallery');




