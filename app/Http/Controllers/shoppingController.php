<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shoppingController extends Controller
{
    public function home()
    {
        $lastProduct = DB::table('product')
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $promotionProduct = DB::table('product')
            ->whereRaw('sale_price < regular_price')
            ->limit(4)
            ->get();
        $pupularProduct = DB::table('product')
            ->orderBy('views','DESC')
            ->limit(4)
            ->get();

        return view('frontend.home', ['lastProduct' => $lastProduct, 'promotionProduct' => $promotionProduct , 'pupularProduct'=>$pupularProduct]);
    }

    public function news()
    {
        return view('frontend.news');
    }

    public function shops()
    {
        return view('frontend.shop');
    }

    public function detail($id)
    {
        // get views 
                        DB::table('product')
                        ->where('id',$id)
                        ->increment('views',1);
                      
        $detailProduct = DB::table('product')
            ->where( 'id', $id)
            ->get();
        $relatedProduct = DB::table('product')
            ->where('id' ,'<>',$id)
            ->where('category_id',$detailProduct[0]->category_id)
            ->get();
        return view('frontend.detail' , ['detailProduct'=>$detailProduct , 'relatedProduct'=>$relatedProduct]);
    }

    public function search()
    {
        return view('frontend.search');
    }
}
