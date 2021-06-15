<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\dashboardController;
use Illuminate\Http\Request;
use App\User;

class HomeController extends dashboardController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        return view('dashboard.home',['user' => $user]);
    }
}
