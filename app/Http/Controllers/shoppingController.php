<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shoppingController extends Controller
{
    public function home(){
        return view('frontend.home');
    }

    public function news(){
        return view('frontend.news');
    }

    public function shops(){
        return view('frontend.shop');
    }

    public function detail(){
        return view('frontend.detail');
    }

    public function search(){
        return view ('frontend.search');
    }

    
}
