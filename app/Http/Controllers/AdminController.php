<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Contracts\PartnersInterface;
use App\Contracts\HomeBgInterface;
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
    
    public function getHome(PartnersInterface $partnersRepo,HomeBgInterface $homeBgRepo)
    {
        $parners = $partnersRepo->getAll();
        $homeBackground = $homeBgRepo->getAll();
        $data = [
            'partners' => $parners,
            'homeBackgrounds' => $homeBackground,
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
     * @param HomeBgInterface $homeBgRepo
     * @return mixed
     */
    public function postHomeBg(request $request,HomeBgInterface $homeBgRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
              $row = $homeBgRepo->getAll();
              if(count($row) == ""){
                    unset($result['_token']);
                    $logoFile = $result['images']->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/home-background';
                    $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                    $bg_images = $name.'.'.$logoFile;
                    $result['images'] = $bg_images;
                    $homeBgRepo->createData($result);
                    return redirect()->back()->with('message','uploade Succesfully');
              }else{
                  $oneRow = $homeBgRepo->getFirstRow();
                  $oldImage = $oneRow['images'];
                  $oldPath = public_path() . '/assets/home-background/' . $oldImage;
                  File::delete($oldPath);
                  $logoFile = $result['images']->getClientOriginalExtension();
                  $name = str_random(12);
                  $path = public_path() . '/assets/home-background';
                  $result_move = $result['images']->move($path, $name.'.'.$logoFile);
                  $bg_images = $name.'.'.$logoFile;
                  $result['images'] = $bg_images;
                  $homeBgRepo->getUpdateData($oneRow['id'],$result);
                  return redirect()->back()->with('message','Update Images Succesfully');
              }
        }
    }

    /**
     * @param $id
     * @param HomeBgInterface $homeBgRepo
     * @return mixed
     */
    public function getDeleteHomeBg($id,HomeBgInterface $homeBgRepo)
    {
        $row = $homeBgRepo->getOne($id);
        $path = public_path() . '/assets/home-background/' . $row['images'];
        File::delete($path);
        $homeBgRepo->deleteData($id);
        return redirect()->back()->with('message','Delete Succesfully');
    }
    
    public function getWorkShop()
    {
        $data = [
            'activeworkshop' => 1,
        ];
        return view('admin.pages.work-shop',$data);
    }

    public function getInYourSpace()
    {
        $data = [
            'activiinyourspace' => 1,
        ];
        return view('admin.pages.in-your-space',$data);
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
        return view('admin.gallery.add-gallery-page',$data);
    }

    public function postAddGallery(request $request)
    {
        dd($request->all());
    }
}
