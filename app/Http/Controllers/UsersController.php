<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends BaseController
{

    public function __construct()
    {

    }


    public function getHome()
    {
        $data = [
            'hoveNavigator' => 1
        ];
        return view('users.home',$data);
    }

    public function getGalleryCategory()
    {
        return view('users.pages.gallery.gallery-category');
    }

    public function getGallery()
    {
        return view('users.pages.gallery.gallery');
    }

    public function getGalleryInner()
    {
        return view('users.pages.gallery.gallery-inner');
    }

    public function getWorkShop($slug = 'work')
    {
        //$page = page::whereSlug($slug)->first();
        $slug = 'work-shop';
        $data = [
            'workslug' => $slug,
        ];
       // return \View::make('users.pages.workshop.workshop',$data)->with('page', $slug);

        return view('users.pages.workshop.workshop');
    }

    public function getWorkShopInner()
    {
        return view('users.pages.workshop.workshop-inner');
    }

    public function getInYourSpace()
    {
        return view('users.pages.inyourspace.inyourspace');
    }

    public function gerPhotoTour()
    {
        return view('users.pages.phototour.phototour');
    }

    public function getAboutArtist()
    {
        return view('users.pages.aboutartist.aboutartist');
    }

    public function getConnect()
    {
        return view('users.pages.connect.connect');
    }

}
