<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BackgroundInterface;
use App\Contracts\PartnersInterface;

class BaseController extends Controller
{
    public function __construct(BackgroundInterface $bgRepo,PartnersInterface $partnersRepo)
    {
        $backgrounds = $bgRepo->getHomeBg();
        $partners = $partnersRepo->getAll();
        $data = [
            'partners' => $partners,
            'homeBg' => $backgrounds,
        ];

        view()->share($data);
    }
}
