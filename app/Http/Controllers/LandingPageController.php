<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //

    public function __invoke(){
        return view("pages.landing.index");
    }
}
