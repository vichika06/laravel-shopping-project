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
        $row = DB::table('product')
            ->Where('id', $id)
            ->get();
        return view('backend.product.edit_product', ['row' => $row]);
    }

    public function submitEdit(){
        
    }


    // logo
    public function viewLogo()
    {
        $logo = DB::table('logo')->get();

        return view('backend.logo.viewLogo' , ['logo'=>$logo]);
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
            'name'=>$name,
            'thumbnail' => $image
        ]);

        if($result){
            return view ('view-logo');
        }
    }
}
