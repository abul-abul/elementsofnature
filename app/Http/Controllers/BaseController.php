<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BackgroundInterface;
use App\Contracts\PartnersInterface;

class BaseController extends Controller
{
    public function __construct(BackgroundInterface $bgRepo,PartnersInterface $partnersRepo)
    {

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->currentPathWithoutLocale = substr( implode(\Request::segments(), '/'), 0);

        $backgrounds = $bgRepo->getHomeBg();
        $partners = $partnersRepo->getAll();
        $data = [
            'partners' => $partners,
            'homeBg' => $backgrounds,
            'url' => $url
        ];

        view()->share($data);
    }
}
