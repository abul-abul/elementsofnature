<?php

namespace App\Http\Controllers;

use App\Contracts\AboutInterface;
use App\Contracts\NewsGalleryInterface;
use App\Contracts\NewsInterface;
use App\Contracts\PartnersInterface;
use App\Contracts\BackgroundInterface;
use App\Contracts\FooterInterface;
use App\Contracts\GalleryInterface;
use App\Contracts\InYOurSpaceInterface;
use App\Contracts\GalleryCategoryInterface;
use App\Contracts\GalleryCategoryImagesInterface;
use App\Contracts\GalleryCategoryImagesInnerInterface;
use App\Contracts\GalleryCategoryImagesInnerTopInterface;
use App\Contracts\WorkShopInterface;
use App\Contracts\SkillInterface;
use App\Contracts\InYourSpaceTextInterface;
use App\Contracts\PhotoTourInterface;
use App\Contracts\ConnectInterface;
use App\Contracts\GalleryCategoryFrameInterface;

use Illuminate\Http\Request;
use Validator;
use Mail;


class UsersController extends BaseController
{

    public function __construct(BackgroundInterface $bgRepo, PartnersInterface $partnersRepo)
    {
        parent::__construct($bgRepo, $partnersRepo);
    }

    /**
     * @param GalleryInterface $galleryRepo
     * @param GalleryCategoryImagesInterface $galleryCategoryImagesRepo
     * @return mixed
     */
    public function getHome(GalleryInterface $galleryRepo,
                            GalleryCategoryImagesInterface $galleryCategoryImagesRepo,
                            NewsInterface $newsRepo
    )
    {
        $newsFavourite = $newsRepo->getAllNewsFavourite();
        $gallery = $galleryRepo->getHomeRoleGallery();
        $featuresImages = $galleryCategoryImagesRepo->getHomeFeaturesImages();
        $data = [
            'featuresImages' => $featuresImages,
            'homeGallerys' => $gallery,
            'news' => $newsFavourite,
            'hoveNavigator' => 1
        ];
    
        return view('users.home', $data);
    }

    /**
     * @param GalleryCategoryInterface $galleryCategoryRepo
     * @param FooterInterface $footerRepo
     * @return mixed
     */
    public function getGalleryCategory(GalleryCategoryInterface $galleryCategoryRepo, FooterInterface $footerRepo)
    {
        $result = $galleryCategoryRepo->getAll();
        $footer = $footerRepo->getOneRowGalleryCategory();
        $data = [
            'footer' => $footer,
            'gallerys' => $result,
            'gallery_category_active' => 1
        ];
        return view('users.pages.gallery.gallery-category', $data);
    }

    public function getGalleryCategoryImages($id,
                                             GalleryCategoryImagesInterface $galleryCategoryImagesRepo,
                                             BackgroundInterface $backgroundRepo,
                                             FooterInterface $footerRepo,
                                             NewsInterface $newsRepo
    )
    {
        $galleryCategoryImages = $galleryCategoryImagesRepo->getSelectGalleryCatImages($id);
        $background = $backgroundRepo->getGalleryCategoryImages();
        $footer = $footerRepo->getOneRowGalleryCategoryImages();
        $news = $newsRepo->getAllNewsFavourite();
        $data = [
            'id' => $id,
            'footer' => $footer,
            'backgrounds' => $background,
            'news' => $news,
            'galleryCategoryImages' => $galleryCategoryImages
        ];

        return view('users.pages.gallery.gallery', $data);
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
        $allCategoryImages = $galleryCategoryImagesRepo->getAll();
        $firstId = $galleryCategoryImagesRepo->getFirstRow()->id;
        $lastId = $galleryCategoryImagesRepo->getLastRow()->id;
        if (count($categoryImagee) == "") {
            abort(404);
        }
        $result = $GalleryCategoryImagesInnerRepo->getImageFrame($id);
        $imgTop = $galCatImg->getOneGalleryCatInnerTopBg($id);
        $footer = $footerRepo->getOneRowGalleryCategoryImagesInner();
        $data = [
            'id' => $id,
            'firstId' => $firstId,
            'lastId' => $lastId,
            'categoryImagee' => $categoryImagee,
            'imageFrames' => $result,
            'imgTop' => $imgTop,
            'footer' => $footer,
            'allCategoryImages' => $allCategoryImages
        ];
        return view('users.pages.gallery.gallery-inner', $data);
    }

    /**
     * @param $id
     * @param GalleryCategoryFrameInterface $galFrameRepo
     * @param GalleryCategoryImagesInnerInterface $innerRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function getImagesInnerFrame($id,
                                        GalleryCategoryFrameInterface $galFrameRepo,
                                        GalleryCategoryImagesInnerInterface $innerRepo
                                        )
    {
        $frames = $galFrameRepo->getAllFramesInId($id);
        $inner = $innerRepo->getOne($id);

        return response()->json(['frames' => $frames,'inners' => $inner]);
    }

    /**
     * @param $id
     * @param GalleryCategoryFrameInterface $innerRepo
     * @return mixed
     */
    public function getGalleryFrameIdPriceAjax($id,GalleryCategoryFrameInterface $innerRepo)
    {
        $result = $innerRepo->getOne($id);
        return response()->json(['data'=>$result]);
    }
    /**
     * @param WorkShopInterface $workShopRepo
     * @param FooterInterface $footerRepo
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function getWorkShop(WorkShopInterface $workShopRepo,FooterInterface $footerRepo,BackgroundInterface $bgRepo)
    {
        $result = $workShopRepo->getAll();
        $footer = $footerRepo->getOneRowWorkShop();
        $Backgrount = $bgRepo->getWorkshopBackgrountImages();
        $data = [
            'backgrounds' => $Backgrount,
            'workshops' => $result,
            'activeworkshop' => 1,
            'footer' => $footer
        ];
        return view('users.pages.workshop.workshop',$data);
    }

    /**
     * @param $id
     * @param WorkShopInterface $workShopRepo
     * @param FooterInterface $footerRepo
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function getWorkShopInner($id,
                                     WorkShopInterface $workShopRepo,
                                     FooterInterface $footerRepo,
                                     BackgroundInterface $bgRepo,
                                     SkillInterface $skillRepo)
    {
        $result = $workShopRepo->getOne($id);
        $skills = $skillRepo->getWorkshopSkiils($id);
        if(count($result) == null){
            abort(404);
        }
        $footer = $footerRepo->getOneRowWorkShop();
        $backgrount = $bgRepo->getWorkshopBackgrountImages();
        $data = [
            'backgrounds' => $backgrount,
            'workshops' => $result,
            'activeworkshop' => 1,
            'footer' => $footer,
            'skills' => $skills
        ];
        return view('users.pages.workshop.workshop-inner',$data);
    }

    /**
     * @param BackgroundInterface $bgRepo
     * @param InYOurSpaceInterface $inYorSpaceRepo
     * @param InYourSpaceTextInterface $inYourSpaceTextRepo
     * @param FooterInterface $footerRepo
     * @return mixed
     */
    public function getInYourSpace(BackgroundInterface $bgRepo,
                                   InYOurSpaceInterface $inYorSpaceRepo,
                                   InYourSpaceTextInterface $inYourSpaceTextRepo,
                                   FooterInterface $footerRepo)
    {
        $background = $bgRepo->getInYourSpaceBg();
        $inyourspace = $inYorSpaceRepo->getAll();
        $inYourSpaceText = $inYourSpaceTextRepo->getFirstRow();
        $footer = $footerRepo->getOneRowInYourSpace();
        $data = [
            'activiinyourspace' => 1,
            'inYourSpaceTexts' => $inYourSpaceText,
            'inyourspaces' => $inyourspace,
            'footer' => $footer,
            'backgrounds' => $background
        ];
        return view('users.pages.inyourspace.inyourspace',$data);
    }

    /**
     * @param PhotoTourInterface $photoRepo
     * @param FooterInterface $footerRepo
     * @param BackgroundInterface $bgRepo
     * @param SkillInterface $skillRepo
     * @return mixed
     */
    public function gerPhotoTour(PhotoTourInterface $photoRepo,
                                 FooterInterface $footerRepo,
                                 BackgroundInterface $bgRepo,
                                 SkillInterface $skillRepo)
    {
        $phototours = $photoRepo->getAll();
        $footer = $footerRepo->getOneRowPhotoTour();
        $backgrount = $bgRepo->getPhotoTourBackgrountImages();
        $full_block = [
            'skill' => [],
            'photo'  => $phototours
        ];
        foreach($phototours as $phototour){
            $skills = $skillRepo->getPhotoTourSkiils($phototour->id);
            array_push($full_block['skill'],$skills);
        }
        $data = [
            'footer' => $footer,
            'backgrounds' => $backgrount,
            'phototours' => $full_block,
            'activephototour' => 1,
        ];
        return view('users.pages.phototour.phototour',$data);
    }


    /**
     * @param ConnectInterface $connectRepo
     * @param FooterInterface $footerRepo
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function getConnect(ConnectInterface $connectRepo,FooterInterface $footerRepo,BackgroundInterface $bgRepo)
    {
        $connect = $connectRepo->getAll();
        $background = $bgRepo->getConnectBackgroundImages();
        $footer = $footerRepo->getOneRowConnect();
        $data = [
            'connects' => $connect,
            'activeconnect' => 1,
            'backgrounds' => $background,
            'footer' => $footer
        ];
        return view('users.pages.connect.connect',$data);
    }

    /**
     * @param Request $request
     * @param ConnectInterface $connectRepo
     * @return mixed
     */
    public function postConnect(request $request,ConnectInterface $connectRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'name' => 'required',
            'email' => 'required|email',
            'team' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $email = $result['email'];
            $dataEmail = $result['message'];
            $data = [
                'message' => $dataEmail
            ];
            Mail::send('users.mail.send-email-connect', $data, function($message) use ($email)
            {
                $message->from('abul-abul90@mail.ru');
                $message->to($email)->subject("Welcome!");
            });
            $connectRepo->createData($result);
            return redirect()->back()->with('message','Thanks for your message');
        }
    }

    /**
     * @param AboutInterface $aboutRepo
     * @param FooterInterface $footerRepo
     * @param NewsInterface $newsRepo
     * @return mixed
     */
    public function getAboutArtist(AboutInterface $aboutRepo,FooterInterface $footerRepo,NewsInterface $newsRepo)
    {
        $abouts = $aboutRepo->getAll();
        $footer = $footerRepo->getOneRowAbout();
        $news = $newsRepo->getAll();
        $data = [
            'abouts' => $abouts,
            'footer' => $footer,
            'news' => $news,
            'activeaboutartist' => 1
        ];
        return view('users.pages.aboutartist.aboutartist',$data);
    }

    /**
     * @param $id
     * @param NewsInterface $newsRepo
     * @param NewsGalleryInterface $newsGalleryRepo
     * @return mixed
     */
    public function getNewsInner($id,NewsInterface $newsRepo,NewsGalleryInterface $newsGalleryRepo)
    {
        $news = $newsRepo->getOne($id);
        $newsGallery = $newsGalleryRepo->newsByGallery($id);
        $data = [
            'news' => $news,
            'newsGallery' => $newsGallery
        ];
        return view('users.pages.news.news-inner',$data);
    }



}
