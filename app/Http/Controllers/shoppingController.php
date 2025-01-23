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
            ->orderBy('views', 'DESC')
            ->limit(4)
            ->get();

        return view('frontend.home', ['lastProduct' => $lastProduct, 'promotionProduct' => $promotionProduct, 'pupularProduct' => $pupularProduct]);
    }

    public function news()
    {
        $newsBlog = DB::table('news')
            ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.news', ['newsBlog' => $newsBlog]);
    }

    public function shops()
    {
        return view('frontend.shop');
    }

    public function detail($id)
    {
        // get views 
        DB::table('product')
            ->where('id', $id)
            ->increment('views', 1);

        $detailProduct = DB::table('product')
            ->where('id', $id)
            ->get();
        $relatedProduct = DB::table('product')
            ->where('id', '<>', $id)
            ->where('category_id', $detailProduct[0]->category_id)
            ->get();
        return view('frontend.detail', ['detailProduct' => $detailProduct, 'relatedProduct' => $relatedProduct]);
    }

    public function search()
    {
        return view('frontend.search');
    }

    // news
    public function NewsDetail($id)
    {
        DB::table('news')
            ->where('id', $id)
            ->increment('view', 1);

        $getNews = DB::table('news')
            ->where('id', $id)
            ->get();

        return view('frontend.news-detail', ['getNews' => $getNews]);
    }

    // shop
    public function filter(Request $request)
    {
        // Get the selected filters
        $colors = $request->input('color', []);
        $sizes = $request->input('size', []);

        // Build the query
        $query = DB::table('product');

        // Apply color filter
        if (!empty($colors)) {
            $query->where(function ($q) use ($colors) {
                foreach ($colors as $color) {

                    $q->orWhere('color', 'LIKE', "%$color%");
                }
            });
        }

        // Apply size filter
        if (!empty($sizes)) {
            $query->where(function ($q) use ($sizes) {
                foreach ($sizes as $size) {

                    $q->orWhere('size', 'LIKE', "%$size%");
                }
            });
        }

        // Get the filtered results
        $products = $query->paginate(8);
        // dd($products);
        // Return view with filtered products
        return view('frontend.shop', ['products' => $products]);
    }
}
