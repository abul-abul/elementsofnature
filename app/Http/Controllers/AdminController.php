<?php

namespace App\Http\Controllers;

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
    public function __construct()
    {
        parent::__construct();
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
            return redirect()->back()->with('message','You added partners');
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
            return redirect()->back()->with('message','Add One Gallery');
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

    public function getWorkShop()
    {
        $data = [
            'activeworkshop' => 1,
        ];
        return view('admin.pages.work-shop',$data);
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
        return redirect()->intended('/admin/gallery-category#tab_0')->with('message','You haveuploaded images');
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



    public function getGalleryCategoryImages($id,
                                             GalleryCategoryImagesInterface $galleryCategoryImagesRepo,
                                             GalleryCategoryImagesInterface $GalleryCategoryImagesRepo,
                                             BackgroundInterface $backgroundRepo,
                                             FooterInterface $footerRepo
                                            )
    {
        $galleryCategoryImages = $galleryCategoryImagesRepo->getSelectGalleryCatImages($id);
        $background = $backgroundRepo->getGalleryCategoryImages();
        $footer = $footerRepo->getOneRowGalleryCategoryImages();
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
     * @param Request $request
     * @param GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
     * @return mixed
     */
    public function postAddGalleryCategoryImages(request $request,GalleryCategoryImagesInterface $GalleryCategoryImagesRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $logoFile = $result['images']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/gallery-category-images';
        $result_move = $result['images']->move($path, $name.'.'.$logoFile);
        $gallery_images = $name.'.'.$logoFile;
        $result['images'] = $gallery_images;
        $GalleryCategoryImagesRepo->createData($result);
        return redirect()->back()->with('message','You have Added Gallery Category Images');
    }

    /**
     * @param Request $request
     * @param GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
     * @return mixed
     */
    public function postAddGalleryCategoryInner(request $request,GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo)
    {
        $result =$request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
            'title' => 'required',
            'size' => 'required',
            'frame_canvas' => 'required',
            'frame' => 'required',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $logoFile = $result['images']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/gallery-category-images';
        $result_move = $result['images']->move($path, $name.'.'.$logoFile);
        $gallery_images = $name.'.'.$logoFile;
        $result['images'] = $gallery_images;
        $GalleryCategoryImagesInnerRepo->createData($result);
        return redirect()->back()->with('message','You have Added  Gallery Category Images Frame Images');
    }

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
     * @param GalleryCategoryImagesInterface $GalleryCategoryImagesRepo
     * @return View
     */
    public function getEditGalleryCategoryImages($id,GalleryCategoryImagesInterface $GalleryCategoryImagesRepo)
    {
        $row = $GalleryCategoryImagesRepo->getOne($id);
        $data = [
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
                                                   FooterInterface $footerRepo
                                                    )
    {
        $result = $GalleryCategoryImagesInnerRepo->getImageFrame($id);
        $imgTop = $galCatImg->getOneGalleryCatInnerTopBg($id);
        $footer = $footerRepo->getOneRowGalleryCategoryImagesInner();

       $data = [
           'id' => $id,
           'imageFrames' => $result,
           'imgTop' => $imgTop,
           'footer' => $footer
       ];
        return view('admin.pages.gallery-category-images.view-image-inner',$data);
    }

    /**
     * @param $id
     * @param GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo
     * @return View
     */
    public function getEditGalleryCategoryImagesInner($id,GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo)
    {
        $result = $GalleryCategoryImagesInnerRepo->getOne($id);
        $data = [
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
     * @return mixed
     */
    public function getDeleteGalleryCategoryImagesInner($id,GalleryCategoryImagesInnerInterface $GalleryCategoryImagesInnerRepo)
    {
        $row = $GalleryCategoryImagesInnerRepo->getOne($id);
        $path = public_path() . '/assets/gallery-category-images/' . $row['images'];
        File::delete($path);
        $GalleryCategoryImagesInnerRepo->deleteData($id);
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
                                                    GalleryCategoryImagesInnerInterface $catImgInnerRepo
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
                                                   GalleryCategoryImagesInnerInterface $catImgInnerRepo
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
            return redirect()->intended('/admin/gallery-category#tab_1')->with('message','You added In Your space Background');
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
            'images2' => 'required',
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

                $path1 = public_path() . '/assets/gallery-category-images';
                $logoFile1 = $result['images2']->getClientOriginalExtension();
                $name1 = str_random(12);
                $result_move1 = $result['images2']->move($path1, $name1.'.'.$logoFile1);
                $gallery_images1 = $name1.'.'.$logoFile1;
                $result['images2'] = $gallery_images1;
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











    public function getPhotoTour()
    {
        $data = [
            'activephototour' => 1,
        ];
        return view('admin.pages.photo-tour',$data);
    }

    public function getAboutArtist()
    {
        $data = [
            'activeaboutartist' => 1,
        ];
        return view('admin.pages.about-artist',$data);
    }

    public function getConnect()
    {
        $data = [
            'activeconnect' => 1,
        ];
        return view('admin.pages.connect',$data);
    }

    public function getAddGalleryPage()
    {
        $data = [
            'activeAddGalleryPage' => 1
        ];
        return view('admin.gallery-images.add-gallery-images-page',$data);
    }


}
