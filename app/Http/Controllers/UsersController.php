<?php

namespace App\Http\Controllers;
use App\Contracts\PartnersInterface;
use App\Contracts\BackgroundInterface;
use App\Contracts\FooterInterface;
use App\Contracts\GalleryInterface;
use App\Contracts\InYOurSpaceInterface;
use App\Contracts\GalleryCategoryInterface;
use App\Contracts\GalleryCategoryImagesInterface;
use App\Contracts\GalleryCategoryImagesInnerInterface;
use App\Contracts\GalleryCategoryImagesInnerTopInterface;
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

    /**
     * @param GalleryCategoryInterface $galleryCategoryRepo
     * @param FooterInterface $footerRepo
     * @return mixed
     */
    public function getGalleryCategory(GalleryCategoryInterface $galleryCategoryRepo,FooterInterface $footerRepo)
    {
        $result = $galleryCategoryRepo->getAll();
        $footer = $footerRepo->getOneRowGalleryCategory();
        $data = [
            'footer' => $footer,
            'gallerys' => $result
        ];

        return view('users.pages.gallery.gallery-category',$data);
    }

    public function getGalleryCategoryImages($id,
                                             GalleryCategoryImagesInterface $galleryCategoryImagesRepo,
                                             BackgroundInterface $backgroundRepo,
                                             FooterInterface $footerRepo
                                            )
    {
        $galleryCategoryImages = $galleryCategoryImagesRepo->getSelectGalleryCatImages($id);
        $background = $backgroundRepo->getGalleryCategoryImages();
        $footer = $footerRepo->getOneRowGalleryCategoryImages();
        $data = [
            'id' => $id,
            'footer' => $footer,
            'backgrounds' => $background,
            'galleryCategoryImages' => $galleryCategoryImages
        ];

        return view('users.pages.gallery.gallery',$data);
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
     * @param GalleryCategoryImagesInnerTopInterface $galCatImg
     * @param FooterInterface $footerRepo
     * @return mixed
     */
    public function getGalleryInner($id,
                                    GalleryCategoryImagesInterface $galleryCategoryImagesRepo,
                                    GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo,
                                    GalleryCategoryImagesInnerTopInterface $galCatImg,
                                    FooterInterface $footerRepo
                                    )

    {
        $categoryImagee = $galleryCategoryImagesRepo->getOne($id);
        $result = $GalleryCategoryImagesInnerRepo->getImageFrame($id);
        $imgTop = $galCatImg->getOneGalleryCatInnerTopBg($id);
        $footer = $footerRepo->getOneRowGalleryCategoryImagesInner();
        $data = [
            'id' => $id,
            'categoryImagee' => $categoryImagee,
            'imageFrames' => $result,
            'imgTop' => $imgTop,
            'footer' => $footer
        ];
        return view('users.pages.gallery.gallery-inner',$data);
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
