<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function privacy(){
        return view('pages.privacy');
    }

    public function about(){
        return view('pages.about');
    }
}
