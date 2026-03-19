<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        //$settings = SiteSetting::first();
        //return view('frontend.home', compact('settings'));
        return view('frontend.home');

    }
}