<?php

namespace App\Http\Controllers;

use App\Contracts\AboutInterface;
use App\Contracts\InYourSpaceTextInterface;
use App\GalleryCategory;
use App\GalleryCategoryImagesInner;
use App\Services\InYourSpaceTextService;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
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
use App\Contracts\PhotoTourInterface;
use App\Contracts\ConnectInterface;
use App\Contracts\GalleryCategoryFrameInterface;
use App\Contracts\NewsInterface;
use App\Contracts\NewsGalleryInterface;
use App\Contracts\PhotoTourRequestInterface;
use App\Contracts\WorkShopRequestInterface;
use View;
use Session;
use Validator;
use Auth;
use File;


class AdminController extends BaseController
{
    /**
     * AdminController constructor.
     */
    public function __construct(BackgroundInterface $bgRepo,PartnersInterface $partnersRepo)
    {
        parent::__construct($bgRepo,$partnersRepo);
        $this->middleware('authadmin', ['except' => ['getLogin', 'postLogin','getLogout']]);
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return view('admin.admin-login.admin-login');
    }

    /**
     * @param AdminLoginRequest $request
     * @return mixed
     */
    public function postLogin(AdminLoginRequest $request)
    {
        $name = $request->get('name');
        $password  = $request->get('password');

        if(Auth::attempt ([
            'name'=>$name,
            'password'=>$password,
        ]))
        {
            return redirect()->action('AdminController@getDashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid login or password');
        }
    }

    /**
     * @return mixed
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->action('AdminController@getLogin');
    }

    /**
     * @return mixed
     */
    public function getDashboard()
    {
        return view('admin.dashboard.dashboard');
    }
    
    public function getHome(PartnersInterface $partnersRepo,BackgroundInterface $homeBg,GalleryInterface $galleryRepo)
    {
        $parners = $partnersRepo->getAll();
        $backgrounds = $homeBg->getHomeBg();
        $gallery = $galleryRepo->getHomeRoleGallery();
        $data = [
            'partners' => $parners,
            'backgrounds' => $backgrounds,
            'homeGallerys' => $gallery,
            'activeHome' => 1
        ];
        return view('admin.pages.home.home',$data);
    }

    /**
     * @param Request $request
     * @param PartnersInterface $partnersRepo
     * @return mixed
     */
    public function postAddPartners(request $request,PartnersInterface $partnersRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'link' => 'required',
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/partners-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $article_images = $name.'.'.$logoFile;
            $result['images'] = $article_images;
            $partnersRepo->createData($result);
            return redirect()->intended('/admin/home#tab_1')->with('message','You added partners');
        }
    }

    /**
     * @param $id
     * @param PartnersInterface $partnersRepo
     * @return mixed
     */
    public function getPartnersDelete($id,PartnersInterface $partnersRepo)
    {
        $file = $partnersRepo->getOne($id);
        $filename = public_path() . '/assets/partners-images/' . $file['images'];
        if ($filename){
            $status = File::delete($filename);
            $partnersRepo->deleteData($id);
            return redirect()->back()->with('message','Deleted Successfully');
        }else{
            abort(404);
        }
    }

    /**
     * @param Request $request
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function postHomeBg(request $request,BackgroundInterface $bgRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $row = $bgRepo->getHomeBg();
            if (count($row) == "") {
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name . '.' . $logoFile);
                $gallery_images = $name . '.' . $logoFile;
                $result['images'] = $gallery_images;
                $result['role'] = 'home';
                $bgRepo->createData($result);
            } else {
                $oldPath = public_path() . '/assets/background-images/' . $row['images'];
                File::delete($oldPath);
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name . '.' . $logoFile);
                $gallery_images = $name . '.' . $logoFile;
                $result['images'] = $gallery_images;
                $bgRepo->getUpdateData($row['id'], $result);
            }
            return redirect()->back()->with('message', 'You added In Your space Background');
        }
    }

    /**
     * @param $id
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function getDeleteHomeBg($id,BackgroundInterface $bgRepo)
    {
        $row = $bgRepo->getOne($id);
        $path = public_path() . '/assets/background-images/' . $row['images'];
        File::delete($path);
        $bgRepo->deleteData($id);
        return redirect()->back()->with('message','Delete Succesfully');
    }

    /**
     * @param Request $request
     * @param GalleryInterface $galleryRepo
     * @return mixed
     */
    public function postAddHomeGallery(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $result['role'] = 'home';
            $galleryRepo->createData($result);
            return redirect()->intended('/admin/home#tab_2')->with('message','Add One Gallery');
        }
    }

    /**
     * @param $id
     * @param GalleryInterface $galleryRepo
     * @return View
     */
    public function getEditHomeGallery($id,GalleryInterface $galleryRepo)
    {
        $result = $galleryRepo->getOne($id);
        $data = [
            'activeHome' => 1,
            'gallerys' => $result
        ];
        return view('admin.pages.home.home-gallery-edit',$data);
    }

    /**
     * @param Request $request
     * @param GalleryInterface $galleryRepo
     * @return mixed
     */
    public function postEditHomeGallery(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
        if(isset($result['images'])){
            $row = $galleryRepo->getOne($result['id']);
            $path = public_path() . '/assets/gallery-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $galleryRepo->getUpdateData($result['id'],$result);
        }else{
            $galleryRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->action('AdminController@getHome')->with('message','Update Succesfully');
    }

    /**
     * @param $id
     * @param GalleryInterface $galleryRepo
     * @return mixed
     */
    public function getDeleteHomeGallery($id,GalleryInterface $galleryRepo)
    {
        $result = $galleryRepo->getOne($id);
        $path = public_path() . '/assets/gallery-images/' . $result['images'];
        File::delete($path);
        $galleryRepo->deleteData($id);
        return redirect()->back()->with('message','File Deleted');
    }

    /**
     * @param Request $request
     * @param GalleryInterface $galleryRepo
     * @return mixed
     */
    public function postUpdateFavourite(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();

        $data = [
            'favourite' => $result['favourite']
        ];
        $galleryRepo->getUpdateData($result['id'],$data);
        return redirect()->back();
    }



    /**
     * @param BackgroundInterface $bgRepo
     * @return View
     */
    public function getInYourSpace(BackgroundInterface $bgRepo,
                                    InYOurSpaceInterface $inYorSpaceRepo,
                                    InYourSpaceTextInterface $inYourSpaceTextRepo,
                                    FooterInterface $footerRepo
                                    )
    {
        $result = $bgRepo->getInYourSpaceBg();
        $inyourspace = $inYorSpaceRepo->getAll();
        $inYourSpaceText = $inYourSpaceTextRepo->getFirstRow();
        $inypurSpaceRepo = $footerRepo->getOneRowInYourSpace();
        $data = [
            'activiinyourspace' => 1,
            'inYourSpaceTexts' => $inYourSpaceText,
            'inyourspaces' => $inyourspace,
            'inYourSpaceFooters' => $inypurSpaceRepo
        ];
        if (count($result) != ""){
            $data['backgrounds'] = $result;
        }
        return view('admin.pages.in-your-space',$data);
    }

    /**
     * @param Request $request
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function postAddInYourSpaceBackground(request $request,BackgroundInterface $bgRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $row = $bgRepo->getInYourSpaceBg();
            if(count($row) == ""){
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $result['role'] = 'inyourspace';
                $bgRepo->createData($result);
            }else{
                $oldPath = public_path() . '/assets/background-images/' . $row['images'];
                File::delete($oldPath);
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $bgRepo->getUpdateData($row['id'],$result);
            }
            return redirect()->back()->with('message','You added In Your space Background');
        }
    }

    /**
     * @param $id
     * @param BackgroundInterface $bgRepo
     * @return View
     */
    public function getEditInYourSpace($id,BackgroundInterface $bgRepo)
    {
        $row = $bgRepo->getOne($id);
        $data = [
            'activiinyourspace' => 1,
            'id' => $id,
            'background' => $row,
        ];
        return view('admin.pages.edit-background',$data);
    }

    /**
     * @param Request $request
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function postEditBackground(request $request,BackgroundInterface $bgRepo)
    {
        $result = $request->all();
        if(isset($result['images'])){
            $row = $bgRepo->getOne($result['id']);
            $path = public_path() . '/assets/background-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/background-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $bgRepo->getUpdateData($result['id'],$result);
        }else{
            $bgRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->back()->with('message','Update Background Updated');
    }

    /**
     * @param $id
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function getDeleteInYourSpace($id,BackgroundInterface $bgRepo)
    {
        $result = $bgRepo->getOne($id);
        $path = public_path() . '/assets/background-images/' . $result['images'];
        File::delete($path);
        $bgRepo->deleteData($id);
        return redirect()->back()->with('message','Your File deleted');
    }

    /**
     * @param Request $request
     * @param InYOurSpaceInterface $inYorSpaceRepo
     * @return mixed
     */
    public function postInYourSpaceImages(request $request,InYOurSpaceInterface $inYorSpaceRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/in-your-space-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $inYorSpaceRepo->createData($result);
            return redirect()->intended('/admin/in-your-space#tab_1')->with('message','Images Added');
        }
    }

    /**
     * @param $id
     * @param InYOurSpaceInterface $inYorSpaceRepo
     * @return mixed
     */
    public function getDeleteInYourSpaceImages($id,InYOurSpaceInterface $inYorSpaceRepo)
    {
        $row = $inYorSpaceRepo->getOne($id);
        $path = public_path() . '/assets/in-your-space-images/' .$row['images'];
        File::delete($path);
        $inYorSpaceRepo->deleteData($id);
        return redirect()->intended('/admin/in-your-space#tab_1')->with('message','File deleted');
    }

    /**
     * @param $id
     * @param InYOurSpaceInterface $inYorSpaceRepo
     * @return View
     */
    public function getEditInYourSpaceImages($id,InYOurSpaceInterface $inYorSpaceRepo)
    {
        $row = $inYorSpaceRepo->getOne($id);
        $data = [
            'imYorspaceImage' => $row
        ];
        return view('admin.pages.inyourspace.edit-inyourspace-images',$data);
    }

    /**
     * @param Request $request
     * @param InYOurSpaceInterface $inYorSpaceRepo
     * @return mixed
     */
    public function postEditInYourSpaceImages(request $request,InYOurSpaceInterface $inYorSpaceRepo)
    {
        $result = $request->all();
        if(isset($result['images'])){
            $row = $inYorSpaceRepo->getOne($result['id']);
            $path = public_path() . '/assets/in-your-space-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/in-your-space-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $inYorSpaceRepo->getUpdateData($result['id'],$result);
        }else{
            $inYorSpaceRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->intended('/admin/in-your-space#tab_1')->with('message','Change was successful');
    }

    /**
     * @param Request $request
     * @param InYourSpaceTextInterface $inYourSpaceTextRepo
     * @return mixed
     */
    public function postInYourSpaceText(request $request,InYourSpaceTextInterface $inYourSpaceTextRepo)
    {
        $result = $request->all();
        $row = $inYourSpaceTextRepo->getFirstRow();

        $validator = Validator::make($result, [
            'text' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->intended('/admin/in-your-space#tab_2')->withErrors($validator);
        }else{
            unset($result['_token']);
            $result['role'] = 'inyourspace';
            if(count($row) == ""){
                $inYourSpaceTextRepo->createData($result);
                return redirect()->intended('/admin/in-your-space#tab_2')->with('message','The Text added');
            }else{
                $inYourSpaceTextRepo->getUpdateData($row['id'],$result);
                return redirect()->intended('/admin/in-your-space#tab_2')->with('message','The Text Updated');
            }

        }
    }

    /**
     * @param $id
     * @param InYourSpaceTextInterface $inYourSpaceTextRepo
     * @return mixed
     */
    public function getDeleteInYourSpaceText($id,InYourSpaceTextInterface $inYourSpaceTextRepo)
    {
        $inYourSpaceTextRepo->deleteData($id);
        return redirect()->intended('/admin/in-your-space#tab_2')->with('message','The Text Deleted');
    }

    /**
     * @param Request $request
     * @param FooterInterface $footerRepo
     * @return mixed
     */
    public function postAddFooterBackground(request $request,FooterInterface $footerRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            if($result['role'] == 'inyourspace'){
                $row = $footerRepo->getOneRowInYourSpace();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->intended('/admin/in-your-space#tab_3')->with('message','Footer Background Update');
            }


            if($result['role'] == 'gallery_category'){
                $row = $footerRepo->getOneRowGalleryCategory();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                    return redirect()->intended('/admin/gallery-category#tab_1')->with('message','Footer Background Added');
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->intended('/admin/gallery-category#tab_1')->with('message','Footer Background Update');
            }


            if($result['role'] == 'gallery_category_images'){
                $row = $footerRepo->getOneRowGalleryCategory();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                    return redirect()->back()->with('message','Footer Background Added');
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->back()->with('message','Footer Background Update');
            }


            if($result['role'] == 'gallery_category_images_inner'){
                $row = $footerRepo->getOneRowGalleryCategoryImagesInner();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                    return redirect()->back()->with('message','Footer Background Added');
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->back()->with('message','Footer Background Update');
            }

            if($result['role'] == 'workshop'){
                $row = $footerRepo->getOneRowWorkShop();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                    return redirect()->intended('/admin/work-shop#tab_2')->with('message','Footer Background Added');
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->intended('/admin/work-shop#tab_2')->with('message','Footer Background Update');
            }

            if($result['role'] == 'phototour'){
                $row = $footerRepo->getOneRowPhotoTour();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                    return redirect()->intended('/admin/photo-tour#tab_2')->with('message','Footer Background Added');
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->intended('/admin/photo-tour#tab_2')->with('message','Footer Background Update');
            }


            if($result['role'] == 'connect'){
                $row = $footerRepo->getOneRowConnect();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                    return redirect()->intended('/admin/connect#tab_2')->with('message','Footer Background Added');
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->intended('/admin/connect#tab_2')->with('message','Footer Background Update');
            }

            if($result['role'] == 'about'){
                $row = $footerRepo->getOneRowAbout();
                if(count($row) == ""){
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->createData($result);
                    return redirect()->intended('/admin/about-artist#tab_2')->with('message','Footer Background Added');
                }else{
                    $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
                    File::delete($oldpath);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/footer-images';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $gallery_images = $name.'.'.$logoFile;
                    $result['images'] = $gallery_images;
                    $footerRepo->getUpdateData($row['id'],$result);
                }
                return redirect()->intended('/admin/about-artist#tab_2')->with('message','Footer Background Update');
            }


        }
    }

    /**
     * @param $id
     * @param FooterInterface $footerRepo
     * @return mixed
     */
    public function getDeleteFooterBacground($id,FooterInterface $footerRepo)
    {
        $row = $footerRepo->getOne($id);
        $oldpath = public_path() . '/assets/footer-images/' . $row['images'];
        File::delete($oldpath);
        $footerRepo->deleteData($id);
        if($row['role'] == 'inyourspace'){
            return redirect()->intended('/admin/in-your-space#tab_3')->with('message','Footer Background Deleted');
        }
        if($row['role'] == 'gallery_category'){
            return redirect()->intended('/admin/gallery-category#tab_1')->with('message','Footer Background Deleted');
        }
        if($row['role'] == 'galleryCategory'){
            return redirect()->intended('/admin/gallery-category#tab_1')->with('message','Footer Background Deleted');
        }
        if($row['role'] == 'gallery_category_images'){
            return redirect()->back()->with('message','Footer Background Deleted');
        }
        if($row['role'] == 'gallery_category_images_inner'){
            return redirect()->back()->with('message','Footer Background Deleted');
        }
        if($row['role'] == 'workshop'){
            return redirect()->intended('/admin/work-shop#tab_2')->with('message','Footer Background Deleted');
        }
         if($row['role'] == 'phototour'){
             return redirect()->intended('/admin/photo-tour#tab_2')->with('message','Footer Background Deleted');
         }
        if($row['role'] == 'connect'){
            return redirect()->intended('/admin/connect#tab_2')->with('message','Footer Background Deleted');
        }
        if($row['role'] == 'about'){
            return redirect()->intended('/admin/about-artist#tab_2')->with('message','Footer Background Deleted');
        }
    }

    /**
     * @param GalleryCategoryInterface $galleryCategoryRepo
     * @param FooterInterface $footerRepo
     * @return View
     */
    public function getGalleryCategory(GalleryCategoryInterface $galleryCategoryRepo,FooterInterface $footerRepo)
    {
        $gallery_Category = $galleryCategoryRepo->getAll();
        $footer = $footerRepo->getOneRowGalleryCategory();
        $data = [
            'gallery_categorys' => $gallery_Category,
            'gallery_category_actiove' => 1,
            'footer' => $footer
        ];
        return view('admin.pages.gallery-category.gallery-category',$data);
    }



    /**
     * @param Request $request
     * @param GalleryCategoryInterface $galleryCategoryRepo
     * @return mixed
     */
    public function postAddGalleryCategory(request $request,GalleryCategoryInterface $galleryCategoryRepo)
    {
        $result = $request->all();

        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->intended('/admin/gallery-category#tab_0')->withErrors($validator);
        }
        $logoFile = $result['images']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/gallery-category-images';

        $result_move = $result['images']->move($path, $name.'.'.$logoFile);

        $gallery_images = $name.'.'.$logoFile;
        $result['images'] = $gallery_images;
        $galleryCategoryRepo->createData($result);
        return redirect()->back()->with('message','You haveuploaded images');
    }

    /**
     * @param $id
     * @param GalleryCategoryInterface $galleryCategoryRepo
     * @return View
     */
    public function getEditGalleryCategory($id,GalleryCategoryInterface $galleryCategoryRepo)
    {
        $row = $galleryCategoryRepo->getOne($id);
        $data = [
            'gallery_category_actiove' => 1,
            'galleryCategory' => $row
        ];
        return view('admin.pages.gallery-category.edit-gallery-category',$data);
    }

    /**
     * @param Request $request
     * @param GalleryCategoryInterface $galleryCategoryRepo
     * @return mixed
     */
    public function postEditGalleryCategory(request $request,GalleryCategoryInterface $galleryCategoryRepo)
    {
        $result = $request->all();
        if(isset($result['images'])){
            $row = $galleryCategoryRepo->getOne($result['id']);
            $path = public_path() . '/assets/gallery-category-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-category-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $galleryCategoryRepo->getUpdateData($result['id'],$result);
        }else{
            $galleryCategoryRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->intended('/admin/gallery-category#tab_0')->with('message','Change was successful');

    }


    /**
     * @param $id
     * @param GalleryCategoryImagesInterface $galleryCategoryImagesRepo
     * @param BackgroundInterface $backgroundRepo
     * @param FooterInterface $footerRepo
     * @return View
     */
    public function getGalleryCategoryImages($id,
                                             GalleryCategoryImagesInterface $galleryCategoryImagesRepo,
                                             BackgroundInterface $backgroundRepo,
                                             FooterInterface $footerRepo
                                            )
    {
        $galleryCategoryImages = $galleryCategoryImagesRepo->getSelectGalleryCatImages($id);
        $background = $backgroundRepo->getCurrenBg($id,'gallery_category_images');

        $footer = $footerRepo->getFotterBg($id,'gallery_category_images');
        $data = [
            'gallery_category_actiove' => 1,
            'id' => $id,
            'footer' => $footer,
            'backgrounds' => $background,
            'galleryCategoryImages' => $galleryCategoryImages
        ];
   
        return view('admin.pages.gallery-category-images.gallery-category-images',$data);
    }


    /**
     * @param $id
     * @return View
     */
    public function getAddGalleryCategoryImages($id)
    {
        $data = [
            'gallery_category_actiove' => 1,
            'id' => $id,
        ];
        return view('admin.pages.gallery-category-images.add-gallery-category-images',$data);
    }



    /**
     * @param Request $request
     * @param GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
     * @return mixed
     */
    public function postAddGalleryCategoryImages(request $request,
                                                 GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
                                                 //GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo,
                                                 //GalleryCategoryFrameInterface $galleryCanvasRepo
                                                 )
    {

        $result = $request->all();

        $validator = Validator::make($result, [
            'images' => 'required',
//            'images_inner' => 'required',
//            'size' => 'required',
//            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-category-images';
            $result_move = $result['images']->move($path, $name . '.' . $logoFile);
            $gallery_images = $name . '.' . $logoFile;

            $data_images = [
                'gallery_category_id' => $result['gallery_category_id'],
                'title' => $result['title'],
                'description' => $result['description'],
                'alt' => $result['alt'],
                'images' => $gallery_images
            ];

            $gallery_images_create = $GalleryCategoryImagesRepo->createData($data_images);
            return redirect()->back()->with('message', 'You have Added Gallery Category Images');

//
//            $logoFile1 = $result['images_inner']->getClientOriginalExtension();
//            $name1 = str_random(12);
//            $path1 = public_path() . '/assets/gallery-category-images';
//            $result_move1 = $result['images_inner']->move($path1, $name1 . '.' . $logoFile1);
//            $gallery_images1 = $name1 . '.' . $logoFile1;
//
//            $data_images_inner = [
//                'gallery_category_images_id' => $gallery_images_create['id'],
//                'title' => $result['title_1'],
//                'description' => $result['description_1'],
//                'alt' => $result['alt_1'],
//                'images' => $gallery_images1,
//                'price' => $result['price']
//            ];


         //   $catImagesInner = $GalleryCategoryImagesInnerRepo->createData($data_images_inner);


//            $img_inner_key_array = [];
//            foreach ($result as $key => $value) {
//                if (count(explode('title_1_', $key)) > 1) {
//                    array_push($img_inner_key_array, $key);
//                }
//                if (count(explode('description_1_', $key)) > 1) {
//                    array_push($img_inner_key_array, $key);
//                }
//                if (count(explode('images_inner_', $key)) > 1) {
//                    array_push($img_inner_key_array, $key);
//                }
//                if (count(explode('alt_1_', $key)) > 1) {
//                    array_push($img_inner_key_array, $key);
//                }
//                if (count(explode('size_', $key)) > 1) {
//                    array_push($img_inner_key_array, $key);
//                }
//                if (count(explode('price_', $key)) > 1) {
//                    array_push($img_inner_key_array, $key);
//                }
//
//                if (explode('frame_', $key) != '') {
//                    if (count(explode('frame_', $key)) > 1) {
//                        array_push($img_inner_key_array, $key);
//                    }
//                }
//
//            }


//            $array_images_value = [];
//            foreach ($img_inner_key_array as $key=>$value){
//                array_push($array_images_value,$result[$value]);
//            }
//
//            for($i=1;$i<=count(array_combine($array_images_value,$img_inner_key_array));$i++) {
//
//                $dataChild = [];
//                if(isset($result['title_1_' . $i]) && $result['title_1_' . $i] != null){
//                    $dataChild['title'] = $result['title_1_' . $i];
//                }
//                if(isset($result['description_1_' . $i]) && $result['description_1_' . $i] != null){
//                    $dataChild['description'] = $result['description_1_' . $i];
//                }
//                if(isset($result['size_' . $i]) && $result['size_' . $i] != null){
//                    $dataChild['size'] = $result['size_' . $i];
//                }
//                if(isset($result['price_' . $i]) && $result['price_' . $i] != null){
//                    $dataChild['price'] = $result['price_' . $i];
//                }
//                if(isset($result['alt_1_' . $i]) && $result['alt_1_' . $i] != null){
//                    $dataChild['alt'] = $result['alt_1_' . $i];
//                }
//
//                if(explode('frame_',$i) != ''){
//                    if(isset($result['frame_' . $i]) && $result['frame_' . $i] != null){
//                        $dataChild['frame'] = $result['frame_' . $i];
//                    }
//                }
//
//                if(isset($result['images_inner_' . $i]) && $result['images_inner_' . $i] != null){
//                    $dataChild['images'] = $result['images_inner_' . $i];
//                    $logoFile = $dataChild['images']->getClientOriginalExtension();
//                    $name = str_random(12);
//                    $path = public_path() . '/assets/gallery-category-images';
//                    $result_move = $dataChild['images']->move($path, $name.'.'.$logoFile);
//                    $gallery_images = $name.'.'.$logoFile;
//                    $dataChild['images'] = $gallery_images;
//                }
//
//                $dataChild['gallery_category_images_id'] = $gallery_images_create['id'];
//                $GalleryCategoryImagesInnerRepo->createData($dataChild);
//                $GalleryCategoryImagesInnerRepo->getDeleteNullFids($dataChild['gallery_category_images_id']);
//            }


//
//            $img_frame_key_array = [];
//            foreach ($result as $key => $value) {
//                if (count(explode('size_', $key)) > 1) {
//                    array_push($img_frame_key_array, $key);
//                }
//                if (explode('frame_', $key) != '') {
//                    if (count(explode('frame_', $key)) > 1) {
//                        array_push($img_frame_key_array, $key);
//                    }
//                }
//            }
//
//            $array_images_value = [];
//            foreach ($img_frame_key_array as $key => $value) {
//                array_push($array_images_value, $result[$value]);
//            }
//            $dataFrame = [
//                'frame' => $result['frame'],
//                'size' => $result['size'],
//                'gallery_category_images_id' => $gallery_images_create['id'],
//                'gallery_category_images_inner_id' => $catImagesInner->id
//            ];
//
//            $galleryCanvasRepo->createData($dataFrame);
//
//            for ($i = 1; $i <= count(array_combine($array_images_value, $img_frame_key_array)); $i++) {
//
//                $dataChild = [];
//
//                if (isset($result['size_' . $i]) && $result['size_' . $i] != null) {
//                    $dataChild['size'] = $result['size_' . $i];
//                }
//
//                if (explode('frame_', $i) != '') {
//                    if (isset($result['frame_' . $i]) && $result['frame_' . $i] != null) {
//                        $dataChild['frame'] = $result['frame_' . $i];
//                    }
//                }
//
//                $dataChild['gallery_category_images_inner_id'] = $catImagesInner->id;
//                $dataChild['gallery_category_images_id'] = $gallery_images_create['id'];
//                $galleryCanvasRepo->createData($dataChild);
//                $galleryCanvasRepo->getDeleteNullFids($catImagesInner->id);
//            }

        }
    }


    /**
     * @param Request $request
     * @param GalleryCategoryFrameInterface $galleryCanvasRepo
     * @param GalleryCategoryImagesInnerInterface $galleryInnerRepo
     * @return mixed
     */
    public function postAddCatImgInner(request $request,
                                       GalleryCategoryFrameInterface $galleryCanvasRepo,
                                       GalleryCategoryImagesInnerInterface $galleryInnerRepo
    )
    {
        $result = $request->all();

        $validator = Validator::make($result, [
            'title' => 'required',
            'price' => 'required',
            'images_inner' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $logoFile = $result['images_inner']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/gallery-category-images';
        $result_move = $result['images_inner']->move($path, $name.'.'.$logoFile);
        $gallery_images = $name.'.'.$logoFile;


        $dataInner = [
            'title' => $result['title'],
            'description' => $result['description'],
          //  'price' => $result['price'],
            'images' => $gallery_images,
            'gallery_category_images_id' => $result['id']
        ];

        $dataInnerObj = $galleryInnerRepo->createData($dataInner);

        $img_frame_key_array = [];
        foreach($result as $key=>$value){

            if(count(explode('size_',$key)) > 1){
                array_push($img_frame_key_array,$key);
            }

            if(explode('frame_',$key) != ''){
                if(count(explode('frame_',$key)) > 1){
                    array_push($img_frame_key_array,$key);
                }
            }

            if(explode('price_',$key) != ''){
                if(count(explode('frame_',$key)) > 1){
                    array_push($img_frame_key_array,$key);
                }
            }

        }

        $array_images_value = [];
        foreach ($img_frame_key_array as $key=>$value){
            array_push($array_images_value,$result[$value]);
        }

        $dataFrame = [
            //'frame' => $result['frame'],
            'price' => $result['price'],
            'size' => $result['size'],
            'gallery_category_images_id' => $result['id'],
            'gallery_category_images_inner_id' => $dataInnerObj->id,

        ];


        if(isset($result['frame'])){
            $dataFrame['frame'] = $result['frame'];
        }

        $galleryCanvasRepo->createData($dataFrame);

        for($i=1;$i<=count(array_combine($array_images_value,$img_frame_key_array));$i++) {

            $dataChild = [];

            if(isset($result['size_' . $i]) && $result['size_' . $i] != null){
                $dataChild['size'] = $result['size_' . $i];
            }

            if(explode('frame_',$i) != ''){
                if(isset($result['frame_' . $i]) && $result['frame_' . $i] != null){
                    $dataChild['frame'] = $result['frame_' . $i];
                }
            }

            if(isset($result['price_' . $i]) && $result['price_' . $i] != null){
                $dataChild['price'] = $result['price_' . $i];
            }

            $dataChild['gallery_category_images_id'] = $result['id'];
            $dataChild['gallery_category_images_inner_id'] = $dataInnerObj->id;
            //$dataChild['price'] = $result['price'];

            $galleryCanvasRepo->createData($dataChild);
            $galleryCanvasRepo->getDeleteNullFids($result['id']);


        }
        return redirect()->back()->with('message','You have Added');

    }



    /**
     * @param Request $request
     * @param GalleryCategoryFrameInterface $galleryCategoryFrame
     * @return \Illuminate\Http\JsonResponse
     */
    public function postEditFrames(request $request,GalleryCategoryFrameInterface $galleryCategoryFrame)
    {
        $result = $request->all();
        $galleryCategoryFrame->getUpdateData($result['id'],$result);
        return redirect()->back()->with('message','You have updated frame');
    }


    /**
     * @param $id
     * @param GalleryCategoryFrameInterface $galleryCanvasRepo
     * @return View
     */
    public function getEditFrames($id,GalleryCategoryFrameInterface $galleryCanvasRepo)
    {
        $result = $galleryCanvasRepo->getOne($id);
        $data = [
            'id' => $id,
            'gallery_category_actiove' => 1,
            'frames' => $result
        ];
        return view('admin.pages.gallery-category-images.edit-frame-size',$data);
    }

    /**
     * @param $image_id
     * @param $frame_id
     * @return View
     */
    public function getAddFramePage($image_id,$frame_id,GalleryCategoryFrameInterface $galleryCanvasRepo)
    {
        $result = $galleryCanvasRepo->getAllFramesInId($frame_id);
        $data = [
            'image_id' => $image_id,
            'frame_id' => $frame_id,
            'frames' => $result,
            'gallery_category_actiove' => 1
        ];
        return view('admin.pages.gallery-category-images.add-frame-page',$data);
    }

    /**
     * @param Request $request
     * @param $
     * @param GalleryCategoryFrameInterface $galleryCanvasRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddImgFrame(request $request,GalleryCategoryFrameInterface $galleryCanvasRepo)
    {
        $result = $request->all();
        $galleryCanvasRepo->createData($result);
        return redirect()->back()->with('message','You have add Frame');
    }

    /**
     * @param $id
     * @param GalleryCategoryFrameInterface $galleryCanvasRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteImgFrame($id,GalleryCategoryFrameInterface $galleryCanvasRepo)
    {
        $galleryCanvasRepo->deleteData($id);
        return redirect()->back()->with('message','You have delete Frame');
    }

    /**
     * @param Request $request
     * @param GalleryCategoryFrameInterface $galleryCategoryFrame
     * @return \Illuminate\Http\JsonResponse
     */
    public function postEditImgFrame(request $request,GalleryCategoryFrameInterface $galleryCategoryFrame)
    {
        $result = $request->all();
        $galleryCategoryFrame->getUpdateData($result['id'],$result);
        return redirect()->back()->with('message','You have updated frame');
    }




//    public function postAddGalleryCategoryInner(request $request,GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo)
//    {
//        $result =$request->all();
//        $validator = Validator::make($result, [
//            'images' => 'required',
//            'title' => 'required',
//            'size' => 'required',
//            'frame_canvas' => 'required',
//            'frame' => 'required',
//            'price' => 'required'
//        ]);
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator);
//        }
//        $logoFile = $result['images']->getClientOriginalExtension();
//        $name = str_random(12);
//        $path = public_path() . '/assets/gallery-category-images';
//        $result_move = $result['images']->move($path, $name.'.'.$logoFile);
//        $gallery_images = $name.'.'.$logoFile;
//        $result['images'] = $gallery_images;
//        $GalleryCategoryImagesInnerRepo->createData($result);
//        return redirect()->back()->with('message','You have Added  Gallery Category Images Frame Images');
//    }

    /**
     * @param $id
     * @param Request $request
     * @param GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
     * @return mixed
     */
    public function getUpdateGalleryCategoryImagesFavourite($id,
                                                            request $request,
                                                            GalleryCategoryImagesInterface $GalleryCategoryImagesRepo)
    {
        $result = $request->all();
        unset($result['_token']);
        $GalleryCategoryImagesRepo->getUpdateData($id,$result);
        return redirect()->back();
    }

    /**
     * @param $id
     * @param Request $request
     * @param GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
     * @return mixed
     */
    public function getUpdateFuteredImages($id,
                                           request $request,
                                           GalleryCategoryImagesInterface $GalleryCategoryImagesRepo)
    {
        $result = $request->all();
        unset($result['_token']);
        $GalleryCategoryImagesRepo->getUpdateData($id,$result);
        return redirect()->back();
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
     * @return View
     */
    public function getEditGalleryCategoryImages($id,GalleryCategoryImagesInterface $GalleryCategoryImagesRepo)
    {
        $row = $GalleryCategoryImagesRepo->getOne($id);
        $data = [
            'gallery_category_actiove' => 1,
            'results' => $row
        ];
        return view('admin.pages.gallery-category-images.edit-gallery-category-images',$data);
    }

    /**
     * @param Request $request
     * @param GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
     * @return mixed
     */
    public function postEditGalleryCategoryImages(request $request,GalleryCategoryImagesInterface $GalleryCategoryImagesRepo)
    {
        $result = $request->all();
        if(isset($result['images'])){
            $row = $GalleryCategoryImagesRepo->getOne($result['id']);
            $path = public_path() . '/assets/gallery-category-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-category-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $GalleryCategoryImagesRepo->getUpdateData($result['id'],$result);
        }else{
            $GalleryCategoryImagesRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->action('AdminController@getGalleryCategoryImages',$result['id'])->with('message','Update was succesfully');
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
     * @return View
     */
    public function getViewGalleryCategoryImgInner($id,
                                                   GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo,
                                                   GalleryCategoryImagesInnerTopInterface $galCatImg,
                                                   FooterInterface $footerRepo,
                                                   GalleryCategoryFrameInterface $galleryFrameRepo
                                                    )
    {
        $result = $GalleryCategoryImagesInnerRepo->getImageFrame($id);
        $imgTop = $galCatImg->getFirstRow();
        $footer = $footerRepo->getOneRowGalleryCategoryImagesInner();
        $frame = $galleryFrameRepo->getAllCanvas($id);

       $data = [
           'gallery_category_actiove' => 1,
           'id' => $id,
           'imageFrames' => $result,
           'imgTop' => $imgTop,
           'footer' => $footer,
           'frames' => $frame
       ];
        return view('admin.pages.gallery-category-images.view-image-inner',$data);
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInnerTopInterface $galCatImg
     * @return View
     */
    public function getEditViewGalleryCategoryImgInner($id,GalleryCategoryImagesInnerTopInterface $galCatImg)
    {
        $result = $galCatImg->getOne($id);
        $data = [
            'gallery_category_actiove' => 1,
            'galCatImg' => $result
        ];
        return view('admin.pages.gallery-category-images.edit-gal-cat-inner-top-bg',$data);
    }
    
    public function postEditGalleryCategoryImagestopBg(request $request,GalleryCategoryImagesInnerTopInterface $galCatImg)
    {
        $result = $request->all();
        if(isset($result['images1'])){
            $row = $galCatImg->getOne($result['id']);
            $path = public_path() . '/assets/gallery-category-images/' . $row['images1'];
            File::delete($path);
            $logoFile = $result['images1']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-category-images';
            $result_move = $result['images1']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images1'] = $gallery_images;
            $galCatImg->getUpdateData($result['id'],$result);
        }
        if(isset($result['images2'])){
            $row = $galCatImg->getOne($result['id']);
            $path = public_path() . '/assets/gallery-category-images/' . $row['images2'];
            File::delete($path);
            $logoFile = $result['images2']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-category-images';
            $result_move = $result['images2']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images2'] = $gallery_images;
            $galCatImg->getUpdateData($result['id'],$result);
        }
        $galCatImg->getUpdateData($result['id'],$result);
        return redirect()->back()->with('message','Update successfully');


    }

    /**
     * @param $id
     * @return View
     */
    public function getAddGalleryImgInnerPage($id)
    {
        $data = [
            'gallery_category_actiove' => 1,
            'id' => $id
        ];
        return view('admin.pages.gallery-category-images.add-gallery-img-inner',$data);
    }



    /**
     * @param $id
     * @param GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
     * @return View
     */
    public function getEditGalleryCategoryImagesInner($id,
                                                      $gal_inner_id,
                                                      GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo,
                                                      GalleryCategoryFrameInterface $galleryCategoryFrame
                                                      )
    {
        $result = $GalleryCategoryImagesInnerRepo->getOne($id);
        $frameReult = $galleryCategoryFrame->getAllCanvas($gal_inner_id);

        $data = [
            'canvas_frames' => $frameReult,
            'gallery_category_actiove' => 1,
            'imageFrame' => $result
        ];
        return view('admin.pages.gallery-category-images.edit-inner',$data);
    }



    /**
     * @param Request $request
     * @param GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
     * @return mixed
     */
    public function postEditGalleryCategoryImagesInner(
                                                       request $request,
                                                       GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
                                                        )
    {
        $result = $request->all();
        if(isset($result['images'])){
            $row = $GalleryCategoryImagesInnerRepo->getOne($result['id']);
            $path = public_path() . '/assets/gallery-category-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/gallery-category-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $GalleryCategoryImagesInnerRepo->getUpdateData($result['id'],$result);
        }else{
            $GalleryCategoryImagesInnerRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->action('AdminController@getViewGalleryCategoryImgInner',$result['gallery_category_images_id'])->with('message','Image Frame is Updated');
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
     * @param GalleryCategoryFrameInterface $frameRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteGalleryCategoryImagesInner($id,
                                                        GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo,
                                                        GalleryCategoryFrameInterface $frameRepo
                                                        )
    {
        $row = $GalleryCategoryImagesInnerRepo->getOne($id);
        $path = public_path() . '/assets/gallery-category-images/' . $row['images'];
        File::delete($path);
        $GalleryCategoryImagesInnerRepo->deleteData($id);

        $allFrames = $frameRepo->getAllFramesInId($id);
        foreach ($allFrames as $allFrame){
            $frameRepo->deleteData($allFrame['id']);
        }
        return redirect()->back()->with('message','File Deleted');
    }

    /**
     * @param $id
     * @param GalleryCategoryInterface $catRepo
     * @param GalleryCategoryImagesInterface $catImgRepo
     * @param GalleryCategoryImagesInnerInterface $catImgInnerRepo
     * @return mixed
     */
    public function getDeleteGalleryCategory($id,
                                                    GalleryCategoryInterface $catRepo,
                                                    GalleryCategoryImagesInterface $catImgRepo,
                                                    GalleryCategoryImagesInnerInterface $catImgInnerRepo,
                                                    GalleryCategoryFrameInterface $frameRepo
                                                   )
    {
        $catRow = $catRepo->getOne($id);
        $catImg = public_path() . '/assets/gallery-category-images/' . $catRow['images'];
        File::delete($catImg);
        $catRepo->deleteData($id);
        $catImgRows = $catImgRepo->getSelectGalleryCatImages($id);
        if(count($catImgRows) != ''){
            foreach ($catImgRows as $catImgRow)
            {
                $pathCatImg = public_path() . '/assets/gallery-category-images/' . $catImgRow['images'];
                File::delete($pathCatImg);
                $catImgRepo->deleteData($catImgRow['id']);

                $rowCatInners = $catImgInnerRepo->getImageFrame($catImgRow['id']);
                if(count($rowCatInners) != ''){

                    foreach ($rowCatInners as $rowCatInner)
                    {
                        $pathCatInner = public_path() . '/assets/gallery-category-images/' . $rowCatInner['images'];
                        File::delete($pathCatInner);
                        $catImgInnerRepo->deleteData($rowCatInner['id']);
                    }

                }

                $allFrames = $frameRepo->getAllCanvas($catImgRow['id']);
                if(count($allFrames) != 0){
                    foreach ($allFrames as $allFrame){
                        $frameRepo->deleteData($allFrame['id']);
                    }
                }
            }
        }
        return redirect()->back()->with('message','You Deleted Gallery Category');
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInterface $catImgRepo
     * @param GalleryCategoryImagesInnerInterface $catImgInnerRepo
     * @return mixed
     */
    public function getDeleteGalleryCategoryImages($id,
                                                   GalleryCategoryImagesInterface $catImgRepo,
                                                   GalleryCategoryImagesInnerInterface $catImgInnerRepo,
                                                   GalleryCategoryFrameInterface $frameRepo

                                                    )
    {
        $catImagesRow = $catImgRepo->getOne($id);
        $catImgagesPath = public_path() . '/assets/gallery-category-images/' . $catImagesRow['images'];
        File::delete($catImgagesPath);
        $catImgRepo->deleteData($id);
        $catImgInnerRows = $catImgInnerRepo->getImageFrame($id);
        if(count($catImgInnerRows) != ""){
            foreach ($catImgInnerRows as $catImgInnerRow)
            {
                $pathCatInnerImg = public_path() . '/assets/gallery-category-images/' . $catImgInnerRow['images'];
                File::delete($pathCatInnerImg);
                $catImgInnerRepo->deleteData($catImgInnerRow['id']);
            }
        }
        $allFrames = $frameRepo->getAllCanvas($id);
        if(count($allFrames) != ""){
            foreach ($allFrames as $allFrame){
                $frameRepo->deleteData($allFrame['id']);
            }
        }
        return redirect()->back()->with('message','You  Deleted Gallery Category Images');
    }

    /**
     * @param Request $request
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function postAddGalleryCategoryImagesBackground(request $request,BackgroundInterface $bgRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $row = $bgRepo->getInYourSpaceBg();
            if(count($row) == ""){
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $result['role'] = 'gallery_category_images';
                $bgRepo->createData($result);
            }else{
                $oldPath = public_path() . '/assets/background-images/' . $row['images'];
                File::delete($oldPath);
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $bgRepo->getUpdateData($row['id'],$result);
            }
            return redirect()->back()->with('message','You added In Your space Background');
        }
    }

    /**
     * @param Request $request
     * @param GalleryCategoryImagesInnerTopInterface $galCatImg
     * @return mixed
     */
    public function postAddCatImagesInnerTop(request $request,GalleryCategoryImagesInnerTopInterface $galCatImg)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images1' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $row = $galCatImg->getOneGalleryCatInnerTopBg($result['gallery_category_images_inner_id']);
            if(count($row) == ''){
                $path = public_path() . '/assets/gallery-category-images';
                $logoFile = $result['images1']->getClientOriginalExtension();
                $name = str_random(12);
                $result_move = $result['images1']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images1'] = $gallery_images;


                $galCatImg->createData($result);
                return redirect()->back()->with('message','Gallery Top Images Added');
            }else{
                return redirect()->back()->with('error','error  delete first row');
            }

        }
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInnerTopInterface $galCatImg
     * @return mixed
     */
    public function getDeleteGalCatImgInnerTop($id,GalleryCategoryImagesInnerTopInterface $galCatImg)
    {
        $row = $galCatImg->getOne($id);
        $path1 =  public_path() . '/assets/gallery-category-images/' . $row['images1'];
        $path2 =  public_path() . '/assets/gallery-category-images/' . $row['images2'];
        File::delete($path1);
        File::delete($path2);
        $galCatImg->deleteData($id);
        return redirect()->back()->with('message','file deleted');
    }


    /**
     * @param WorkShopInterface $workShopRepo
     * @param FooterInterface $footerRepo
     * @param BackgroundInterface $bgRepo
     * @return View
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
        return view('admin.pages.work-shop.work-shop',$data);
    }

    /**
     * @return View
     */
    public function getAddWorkShop()
    {
        $data = [
            'activeworkshop' => 1
        ];
        return view('admin.pages.work-shop.add-work-shop',$data);
    }

    /**
     * @param Request $request
     * @param WorkShopInterface $workShopRepo
     * @return mixed
     */
    public function postAddWorkShop(request $request,WorkShopInterface $workShopRepo,SkillInterface $skillRepo)
    {
        $result = $request->all();

        $validator = Validator::make($result, [
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $path = public_path() . '/assets/work-shop-images';
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $data = [
                'title' => $result['title'],
                'description' => $result['description'],
                'location' => $result['location'],
                'price' => $result['price'],
            ];
            $data['images'] = $gallery_images;
            $created_workshop = $workShopRepo->createData($data);

            $array = [];
            foreach($result as $key=>$value){
                if(count(explode('skill_',$key)) > 1){
                    array_push($array,$key);
                }

            }

            $data_first_skill = [
                'skill' => $result['skill'],
                'role' => 'workshop',
                'workshop_id' => $created_workshop['id']
            ];
            $skillRepo->createData($data_first_skill);

            foreach ($array as $key => $value){
                $data_skill = [
                    'skill' => $result[$value],
                    'role' => 'workshop',
                    'workshop_id' =>  $created_workshop['id']
                ];
                $skillRepo->createData($data_skill);
            }
            return redirect()->action('AdminController@getWorkShop');
        }
    }

    /**
     * @param $id
     * @param WorkShopInterface $workshopRepo
     * @param SkillInterface $skillRepo
     * @return View
     */
    public function getEditWorkShop($id,WorkShopInterface $workshopRepo,SkillInterface $skillRepo)
    {
        $workshop = $workshopRepo->getOne($id);
        $skill = $skillRepo->getWorkshopSkiils($id);
        $data = [
            'activeworkshop' => 1,
            'workshops' => $workshop,
            'skills' => $skill
        ];
        return view('admin.pages.work-shop.edit-work-shop',$data);
    }

    /**
     * @param Request $request
     * @param SkillInterface $skillRepo
     * @param WorkShopInterface $workShopRepo
     * @return mixed
     */
    public function postEditWorkShop(request $request,SkillInterface $skillRepo,WorkShopInterface $workShopRepo)
    {
        $result = $request->all();
        $skills = $skillRepo->getWorkshopSkiils($result['id']);

        $array = [];
        foreach($result as $key=>$value){
            if(count(explode('skill_',$key)) > 1){
                array_push($array,$key);
            }

        }
        $skill_ids = [];
        foreach ($skills as $skill)
        {
            array_push($skill_ids,$skill['id']);
        }

        foreach (array_combine($skill_ids,$array) as $key => $value){
            $data_skill = [
                'skill' => $result[$value],
            ];
            $skillRepo->getUpdateData($key,$data_skill);
        }

        if(isset($result['images'])){
            $row = $workShopRepo->getOne($result['id']);
            $path = public_path() . '/assets/work-shop-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/work-shop-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $workShopRepo->getUpdateData($result['id'],$result);
        }else{
            $workShopRepo->getUpdateData($result['id'],$result);
        }

        return redirect()->action('AdminController@getWorkShop');
    }

    /**
     * @param $id
     * @param SkillInterface $skillRepo
     * @param WorkShopInterface $workShopRepo
     * @return mixed
     */
    public function getDeleteWorkShop($id,SkillInterface $skillRepo,WorkShopInterface $workShopRepo)
    {
        $rowWorkShop = $workShopRepo->getOne($id);
        $rowsSkills = $skillRepo->getWorkshopSkiils($id);
        foreach ($rowsSkills as $rowsSkill)
        {
            $skillRepo->deleteData($rowsSkill['id']);
        }
        $path = public_path() . '/assets/work-shop-images/' . $rowWorkShop['images'];
        File::delete($path);
        $workShopRepo->deleteData($id);
        return redirect()->back()->with('message','Deleted Work Shop');

    }

    /**
     * @param WorkShopRequestInterface $worshopRequestRepo
     * @return View
     */
    public function getWorkshopRequest(WorkShopRequestInterface $worshopRequestRepo)
    {
        $result = $worshopRequestRepo->getAll();
        $data = [
            'workshoprequestactive' => 1,
            'workshoprequests' => $result
        ];
        return view('admin.pages.work-shop.workshop-request',$data);
    }

    public function getWorkshopRequestView($id)
    {
        dd($id);
    }

    /**
     * @param $id
     * @param WorkShopRequestInterface $worhsopRequestRepo
     * @return mixed
     */
    public function getDeleteWorkshopRequest($id,WorkShopRequestInterface $worhsopRequestRepo)
    {
        $worhsopRequestRepo->deleteData($id);
        return redirect()->back()->with('message','Worshop Request deleted');
    }


    public function postAddWorkShopBackgroundTop(request $request,BackgroundInterface $bgRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $row = $bgRepo->getWorkshopBackgrountImages();
            if(count($row) == ""){
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $result['role'] = 'workshop';
                $bgRepo->createData($result);
            }else{
                $oldPath = public_path() . '/assets/background-images/' . $row['images'];
                File::delete($oldPath);
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $bgRepo->getUpdateData($row['id'],$result);
            }
            return redirect()->intended('/admin/work-shop#tab_1')->with('message','You added Work Shop Background');
        }
    }

    /**
     * @param $id
     * @param BackgroundInterface $bgRepo
     * @return View
     */
    public function getEditWorkShopBackgrount($id,BackgroundInterface $bgRepo)
    {
        $row = $bgRepo->getOne($id);
        $data = [
            'activeworkshop' => 1,
            'id' => $id,
            'background' => $row,
        ];
        return view('admin.pages.edit-background',$data);
    }


    /**
     * @param PhotoTourInterface $photoRepo
     * @param FooterInterface $footerRepo
     * @param BackgroundInterface $bgRepo
     * @return View
     */
    public function getPhotoTour(PhotoTourInterface $photoRepo,FooterInterface $footerRepo,BackgroundInterface $bgRepo)
    {
        $phototours = $photoRepo->getAll();
        $footer = $footerRepo->getOneRowPhotoTour();
        $backgrount = $bgRepo->getPhotoTourBackgrountImages();
        $data = [
            'footer' => $footer,
            'backgrounds' => $backgrount,
            'phototours' => $phototours,
            'activephototour' => 1,
        ];
        return view('admin.pages.photo-tour.photo-tour',$data);
    }

    /**
     * @param PhotoTourRequestInterface $photoTourRequestRepo
     * @return View
     */
    public function getPhotoTourRequest(PhotoTourRequestInterface $photoTourRequestRepo)
    {
        $result = $photoTourRequestRepo->getAll();
        $data = [
            'activephototourrequest' => 1,
            'photoRequests' => $result
        ];
        return view('admin.pages.photo-tour.photo-tour-request',$data);
    }

    /**
     * @param $id
     * @param PhotoTourRequestInterface $photoTourRequestRepo
     * @return mixed
     */
    public function getDeletePhotoToureRequest($id,PhotoTourRequestInterface $photoTourRequestRepo)
    {
        $photoTourRequestRepo->deleteData($id);
        return redirect()->back()->with('message','You have delete photo ture request');
    }

    public function getPhotoToureView($id,PhotoTourInterface $photoTourRepo)
    {
        $result = $photoTourRepo->getOne($id);
        $data = [
            'activephototourrequest' => 1,
            'photoToure' => $result
        ];
        return view('admin.pages.photo-tour.view-photo-tour',$data);
    }
    
    /**
     * @return View
     */
    public function getAddPhotoTour()
    {
        $data = [
            'activephototour' => 1,
        ];
        return view('admin.pages.photo-tour.add-photo-tour',$data);
    }

    public function postAddPhotoTour(request $request,PhotoTourInterface $photoRepo,SkillInterface $skillRepo)
    {
        $result = $request->all();

        $validator = Validator::make($result, [
            'title' => 'required',
            'description' => 'required',
            'images' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $path = public_path() . '/assets/photo-tour-images';
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $data = [
                'title' => $result['title'],
                'description' => $result['description'],
                'location' => $result['location']
            ];
            $data['images'] = $gallery_images;
            $created_photo_tour = $photoRepo->createData($data);

            $array = [];
            foreach($result as $key=>$value){
                if(count(explode('skill_',$key)) > 1){
                    array_push($array,$key);
                }

            }

            $data_first_skill = [
                'skill' => $result['skill'],
                'role' => 'phototour',
                'workshop_id' => $created_photo_tour['id']
            ];
            $skillRepo->createData($data_first_skill);

            foreach ($array as $key => $value){
                $data_skill = [
                    'skill' => $result[$value],
                    'role' => 'phototour',
                    'workshop_id' =>  $created_photo_tour['id']
                ];
                $skillRepo->createData($data_skill);
            }
            return redirect()->action('AdminController@getPhotoTour');
        }
    }

    /**
     * @param $id
     * @param SkillInterface $skillRepo
     * @param PhotoTourInterface $photoTourRepo
     * @return View
     */
    public function getEditPhotoTour($id,SkillInterface $skillRepo,PhotoTourInterface $photoTourRepo)
    {
        $photoTour = $photoTourRepo->getOne($id);
        $skill = $skillRepo->getPhotoTourSkiils($id);
        $data = [
            'activephototour' => 1,
            'pototour' => $photoTour,
            'skills' => $skill
        ];
        return view('admin.pages.photo-tour.edit-photo-tour',$data);
    }

    /**
     * @param Request $request
     * @param SkillInterface $skillRepo
     * @param PhotoTourInterface $photoTourRepo
     * @return mixed
     */
    public function postEditPhotoTour(request $request,SkillInterface $skillRepo,PhotoTourInterface $photoTourRepo)
    {
        $result = $request->all();
        $skills = $skillRepo->getPhotoTourSkiils($result['id']);

        $array = [];
        foreach($result as $key=>$value){
            if(count(explode('skill_',$key)) > 1){
                array_push($array,$key);
            }

        }
        $skill_ids = [];
        foreach ($skills as $skill)
        {
            array_push($skill_ids,$skill['id']);
        }

        foreach (array_combine($skill_ids,$array) as $key => $value){
            $data_skill = [
                'skill' => $result[$value],
            ];
            $skillRepo->getUpdateData($key,$data_skill);
        }

        if(isset($result['images'])){
            $row = $photoTourRepo->getOne($result['id']);
            $path = public_path() . '/assets/photo-tour-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/photo-tour-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $photoTourRepo->getUpdateData($result['id'],$result);
        }else{
            $photoTourRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->action('AdminController@getPhotoTour');
    }

    /**
     * @param $id
     * @param SkillInterface $skillRepo
     * @param PhotoTourInterface $photoTourRepo
     * @return mixed
     */
    public function getDeletePhotoTour($id,SkillInterface $skillRepo,PhotoTourInterface $photoTourRepo,PhotoTourRequestInterface $photoTourRequestRepo)
    {
        $rowWorkShop = $photoTourRepo->getOne($id);
        $rowsSkills = $skillRepo->getPhotoTourSkiils($id);
        $pohotoToureRequests = $photoTourRequestRepo->getAllPhotoToureRequest($id);
        foreach ($rowsSkills as $rowsSkill)
        {
            $skillRepo->deleteData($rowsSkill['id']);
        }

        foreach ($pohotoToureRequests as $pohotoToureRequest)
        {
            $photoTourRequestRepo->deleteData($pohotoToureRequest['id']);
        }

        $path = public_path() . '/assets/photo-tour-images/' . $rowWorkShop['images'];
        File::delete($path);
        $photoTourRepo->deleteData($id);
        return redirect()->back()->with('message','Deleted Work Shop');
    }


    /**
     * @param Request $request
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function postAddPhotoTourBackgroundTop(request $request,BackgroundInterface $bgRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $row = $bgRepo->getPhotoTourBackgrountImages();
            if(count($row) == ""){
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $result['role'] = 'phototour';

                $bgRepo->createData($result);
            }else{
                $oldPath = public_path() . '/assets/background-images/' . $row['images'];
                File::delete($oldPath);
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $bgRepo->getUpdateData($row['id'],$result);
            }
            return redirect()->intended('/admin/photo-tour#tab_1')->with('message','You added Work Shop Background');
        }
    }

    /**
     * @param $id
     * @param BackgroundInterface $bgRepo
     * @return View
     */
    public function getEditPhotoTourBackground($id,BackgroundInterface $bgRepo)
    {
        $row = $bgRepo->getOne($id);

        $data = [
            'activeworkshop' => 1,
            'id' => $id,
            'background' => $row,
        ];
        return view('admin.pages.edit-background',$data);
    }

    /**
     * @param ConnectInterface $connectRepo
     * @param FooterInterface $footerRepo
     * @param BackgroundInterface $bgRepo
     * @return View
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
        return view('admin.pages.connect',$data);
    }

    /**
     * @param Request $request
     * @param BackgroundInterface $bgRepo
     * @return mixed
     */
    public function postAddConnectBackgroundTop(request $request,BackgroundInterface $bgRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $row = $bgRepo->getConnectBackgroundImages();
            if(count($row) == ""){
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $result['role'] = 'connect';
                $bgRepo->createData($result);
            }else{
                $oldPath = public_path() . '/assets/background-images/' . $row['images'];
                File::delete($oldPath);
                $path = public_path() . '/assets/background-images';
                $logoFile = $result['images']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/background-images';
                $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                $gallery_images = $name.'.'.$logoFile;
                $result['images'] = $gallery_images;
                $bgRepo->getUpdateData($row['id'],$result);
            }
            return redirect()->intended('/admin/connect#tab_1')->with('message','You added Connect Background');
        }
    }

    /**
     * @param $id
     * @param BackgroundInterface $bgRepo
     * @return View
     */
    public function getEditConnectBackground($id,BackgroundInterface $bgRepo)
    {
        $row = $bgRepo->getOne($id);

        $data = [
            'activeconnect' => 1,
            'id' => $id,
            'background' => $row,
        ];
        return view('admin.pages.edit-background',$data);
    }

    /**
     * @param $id
     * @param ConnectInterface $connectRepo
     * @return mixed
     */
    public function getDeleteConnect($id,ConnectInterface $connectRepo)
    {
        $connectRepo->deleteData($id);
        return redirect()->back()->with('message','Connect Deleted');
    }


    /**
     * @param FooterInterface $footerRepo
     * @param AboutInterface $aboutRepo
     * @return View
     */
    public function getAboutArtist(FooterInterface $footerRepo,AboutInterface $aboutRepo)
    {
        $footer = $footerRepo->getOneRowAbout();
        $abouts = $aboutRepo->getAll();
        $data = [
            'abouts' => $abouts,
            'footer' => $footer,
            'activeaboutartist' => 1,
        ];
        return view('admin.pages.about.about-artist',$data);
    }

    /**
     * @param Request $request
     * @param AboutInterface $aboutRepo
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postAddAbout(request $request,AboutInterface $aboutRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'video' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        unset($result['_token']);
        $aboutRepo->createData($result);
        return redirect()->back()->with('message','You added About');
    }

    /**
     * @param $id
     * @param AboutInterface $aboutRepo
     * @return View
     */
    public function getEditAbout($id,AboutInterface $aboutRepo)
    {
        $row = $aboutRepo->getOne($id);
        $data = [
            'activeaboutartist' => 1,
             'about' => $row
        ];
        return view('admin.pages.about.edit-about-page',$data);
    }

    /**
     * @param Request $request
     * @param AboutInterface $aboutRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditAbout(request $request,AboutInterface $aboutRepo)
    {
        $result = $request->all();
        $aboutRepo->getUpdateData($result['id'],$result);
        return redirect()->action('AdminController@getAboutArtist')->with('message','You edit About');
    }

    /**
     * @param $id
     * @param AboutInterface $aboutRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteAbout($id,AboutInterface $aboutRepo)
    {
        $aboutRepo->deleteData($id);
        return redirect()->back()->with('message','You delete about');
    }

    public function getAddGalleryPage()
    {
        $data = [
            'activeAddGalleryPage' => 1
        ];
        return view('admin.gallery-images.add-gallery-images-page',$data);
    }

    /**
     * @param NewsInterface $newsRepo
     * @return View
     */
    public function getNews(NewsInterface $newsRepo)
    {
        $news =  $newsRepo->getAll();
        $data = [
            'news' => $news,
            'activenews' => 1
        ];
        return view('admin.pages.news.news-page',$data);
    }

    /**
     * @param Request $request
     * @param NewsInterface $newsRepo
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postAddNews(request $request,NewsInterface $newsRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        unset($result['_token']);

        $path = public_path() . '/assets/news-images';
        $logoFile = $result['images']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/news-images';
        $result_move = $result['images']->move($path, $name.'.'.$logoFile);
        $news_images = $name.'.'.$logoFile;
        $result['images'] = $news_images;


        $newsRepo->createData($result);
        return redirect()->back()->with('message','You added News');
    }

    /**
     * @param $id
     * @param NewsInterface $newsRepo
     * @return View
     */
    public function getEditNews($id,NewsInterface $newsRepo)
    {
        $row = $newsRepo->getOne($id);
        $data = [
            'news' => $row,
            'activenews' => 1
        ];
        return view('admin.pages.news.news-edit',$data);

    }

    /**
     * @param Request $request
     * @param NewsInterface $newsRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditNews(request $request,NewsInterface $newsRepo)
    {
        $result = $request->all();
        if(isset($result['images'])){
            $row = $newsRepo->getOne($result['id']);
            $path = public_path() . '/assets/news-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/news-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $newsRepo->getUpdateData($result['id'],$result);
        }else{
            $newsRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->action('AdminController@getNews')->with('message','You have edit news');
    }

    /**
     * @param $id
     * @param NewsInterface $newsRepo
     * @param NewsGalleryInterface $newsGalleryRepo
     * @return mixed
     */
    public function getDeleteNews($id,NewsInterface $newsRepo,NewsGalleryInterface $newsGalleryRepo)
    {
        $row = $newsRepo->getOne($id);
        $path = public_path() . '/assets/news-images/' . $row['images'];
        File::delete($path);
        $newsRepo->deleteData($id);
        $newsGallerys = $newsGalleryRepo->newsByGallery($id);
        foreach ($newsGallerys as $newsGallery){
            $path = public_path() . '/assets/news-images/' . $newsGallery['images'];
            File::delete($path);
            $newsGalleryRepo->deleteData($newsGallery['id']);
        }

        return redirect()->back()->with('message','You have Delete News');
    }

    /**
     * @param $id
     * @param Request $request
     * @param NewsInterface $newsRepo
     * @return mixed
     */
    public function getUpdateNewsFavourite($id,
                                           request $request,
                                           NewsInterface $newsRepo)
    {
        $result = $request->all();
        if($result['favourite'] == 1){
            $favourite = $newsRepo->getAllNewsFavourite();
            if(count($favourite) >= 3){
                return redirect()->back()->with('error','Limitied 3 favourite');
            }
        }
        unset($result['_token']);
        $newsRepo->getUpdateData($id,$result);
        return redirect()->back();
    }

    /**
     * @param $id
     * @param Request $request
     * @param NewsGalleryInterface $newsGalleryRepo
     * @return View
     */
    public function getNewsGallery($id,request $request,NewsGalleryInterface $newsGalleryRepo)
    {
        $result = $newsGalleryRepo->newsByGallery($id);
        $data = [
            'id' => $id,
            'newsGallery' => $result,
            'activenews' => 1
        ];
        return view('admin.pages.news.news-gallery',$data);

    }

    /**
     * @param Request $request
     * @param NewsGalleryInterface $newsGalleryRepo
     * @return mixed
     */
    public function postAddNewsGallery(request $request,NewsGalleryInterface $newsGalleryRepo)
    {
        $results = $request->all();
        unset($results['_token']);
        $data = [];
        foreach ($results['images'] as $result){

            $path = public_path() . '/assets/news-images';
            $logoFile = $result->getClientOriginalExtension();

            $name = str_random(12);
            $path = public_path() . '/assets/news-images';
            $result_move = $result->move($path, $name.'.'.$logoFile);
            $news_images = $name.'.'.$logoFile;
            $data['news_id'] = $results['id'];
            $data['images'] = $news_images;
            $newsGalleryRepo->createData($data);
        }
        return redirect()->back()->with('message','You Have add News Gallery');
    }

    /**
     * @param $id
     * @param $
     * @param NewsGalleryInterface $newsGalleryRepo
     * @return mixed
     */
    public function getDeleteNewsGallery($id,NewsGalleryInterface $newsGalleryRepo)
    {
        $row = $newsGalleryRepo->getOne($id);
        $path = public_path() . '/assets/news-images/' . $row['images'];
        File::delete($path);
        $newsGalleryRepo->deleteData($id);
        return redirect()->back()->with('message','You have Delete News');
    }



}
