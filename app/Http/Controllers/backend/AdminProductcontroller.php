<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductcontroller extends Controller
{
    public function viewProduct()
    {
        $products = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('users', 'product.author_id', '=', 'users.id')
            ->select('product.*', 'category.name AS cat_name', 'users.name AS user_name')
            ->orderBy('product.id', 'DESC')
            ->get();
        return view('backend.product.product', ['product' => $products]);
        // can not space in ->select 
        // dd($products);
    }
    public function addPRoduct()
    {
        $row = DB::table('category')->orderByDesc('id')->get(['id', 'name']);
        return view('backend.product.add-product', ['row' => $row]);
    }
    public function submitProduct(REQUEST $request)
    {
        // implode function to input array to db
        $name          = $request->input('name');
        $qty           = $request->input('qty');
        $regular_price = $request->input('regular_price');
        $sale_price    = $request->input('sale_price');

        $size          = implode(',', $request->input('size'));
        $color         = implode(',', $request->input('color'));

        $category_id   = $request->input('category');
        $thumbnail     = $request->file('thumbnail');
        $description   = $request->input('description');
        $athur_id      = $request->input('id');

        $path = "./assets/image";
        $image = time() . '-' . $thumbnail->getClientOriginalName();
        $thumbnail->move($path, $image);

        $result = DB::table('product')->insert([
            'name'  => $name,
            'qty'   => $qty,
            'regular_price' => $regular_price,
            'sale_price' => $sale_price,
            'size' => $size,
            'color' => $color,
            'category_id' => $category_id,
            'thumbnail' => $image,
            'description' => $description,
            'author_id' => $athur_id
        ]);
        if ($result) {
            return redirect()->back();
        }
    }

    public function EditProduct($id)
    {
        $products = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.*', 'category.id AS cat_id', 'category.name AS cat_name')
            ->where('product.id', $id)
            ->get();
        $category = DB::table('category')
            ->get();
        return view('backend.product.edit_product', ['products' => $products, 'category' => $category]);
    }


    public function submitEdit(Request $request)
    {
        $id            = $request->input('update_id');
        $name          =  $request->input('update_name');
        $qty           =  $request->input('update_qty');
        $regular_price =  $request->input('update_regular_price');
        $sale_price    =  $request->input('update_sale_price');
        $size          =  implode(',', $request->input('update_size'));
        $color         =  implode(',', $request->input('update_color'));
        $description   =  $request->input('update_description');
        $category_id   =  $request->input('update_category');
        $thumbnail     =  $request->file('update_thumbnail');
        if (empty($thumbnail)) {

            $product = DB::table('product')->where('id', $id)->first();
            $img = $product->thumbnail;
        } else {
            $image = $thumbnail;
            $path   = './assets/image';
            $img   = time() . '-' . $image->getClientOriginalName();
            $image->move($path, $img);
        }

        $result = DB::table('product')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'regular_price' => $regular_price,
                'sale_price' => $sale_price,
                'qty' => $qty,
                'thumbnail' => $img,
                'color' => $color,
                'size'  => $size,
                'description' => $description,
                'category_id' => $category_id,
            ]);
        if ($result) {
            return redirect('admin/view-product')->with('success', 'Product updated successfully');
        }
    }


    // logo
    public function viewLogo()
    {
        $logo = DB::table('logo')->get();

        return view('backend.logo.viewLogo', ['logo' => $logo]);
    }
    public function addLogo()
    {
        return view('backend.logo.add_logo');
    }
    public function submitAddLogo(Request $request)
    {
        $name = $request->input('name');
        $logo = $request->file('thumbnail');

        $path = "./assets/image";
        $image = time() . '-' . $logo->getClientOriginalName();
        $logo->move($path, $image);

        $result = DB::table('logo')->insert([
            'name' => $name,
            'thumbnail' => $image
        ]);

        if ($result) {
            return view('view-logo');
        }
    }

    public function removeProduct(Request $request)
    {
        $id = $request->input('remove-id');
        $result = DB::table('product')->where('id', $id)->delete();

        if ($result) {
            return redirect('/admin/view-product');
        }
    }

    // New blog

    public function ViewsNews()
    {
        $viewNews = DB::table('news')
            ->get();
        return view('backend.news.view-news', ['viewNews' => $viewNews]);
    }


    public function AddNews()
    {
        return view('backend.news.add-news');
    }
    public function submmitAddnews(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $newsThum = $request->file('thumbnail');

        $path = "./assets/image";
        $nameImage = time() . '_' . $newsThum->getClientOriginalName();
        $newsThum->move($path, $nameImage);

        $result = DB::table('news')->insert([
            'title' => $title,
            'description' => $description,
            'thumbnail' => $nameImage
        ]);
        if ($result) {
            return redirect()->route('ViewsNews');
        } else {
            return redirect()->back();
        }
    }
    
}
