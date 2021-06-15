<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\siteController;
use Illuminate\Http\Request;
use App\Models\Image;

class homeController extends siteController
{
    public function index()
    {
        return view('site.index');
    }

    public function company()
    {
        $image = Image::where('gallery',8)->where('status',1)->get();
        return view('site.company',['images' => $image ]);
    }
}
