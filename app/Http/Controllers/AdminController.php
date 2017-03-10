<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Contracts\PartnersInterface;
use App\Contracts\BackgroundInterface;
use App\Contracts\FooterInterface;
use App\Contracts\GalleryInterface;
use App\Contracts\InYOurSpaceInterface;
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
        //dd($result['favourite']);
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
    public function getInYourSpace(BackgroundInterface $bgRepo,InYOurSpaceInterface $inYorSpaceRepo)
    {
        $result = $bgRepo->getInYourSpaceBg();
        $inyourspace = $inYorSpaceRepo->getAll();
        $data = [
            'activiinyourspace' => 1,
            'inyourspaces' => $inyourspace
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

    public function postAddGallery(request $request)
    {
        dd($request->all());
    }
}
