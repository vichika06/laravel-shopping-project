<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $row = DB::table('category')->get();
        return view('backend.category.viewCate', ['row' => $row]);
    }
    public function addCategory()
    {
        return view('backend.category.add-category');
    }
    public function submitCategory(Request $request)
    {
        $name = $request->input('name');

        $result = DB::table('category')->insert(
            ['name' => $name]
        );

        if ($result) {
            return redirect()->route('category.view');
        }
    }
    public function editCategory($id)
    {
        $row  =   DB::table('category')
            ->where('id', $id)
            ->get();
        return view('backend.category.edit-category', ['row' => $row]);
    }
    public function submitEditCategory(Request $request)
    {

        $name = $request->input('edited_name');
        $id   = $request->input('edited_id');

        $result = DB::table('category')
            ->where('id', $id)
            ->update(['name' => $name]);
        if ($result) {
            return redirect()->route('category.view');
        }
    }
    public function removeCategory($id){
        return view('backend.category.remove-category',['id'=> $id]);
    }
    public function submitDeleteCategory(Request $request){
        $id = $request -> input('remove_id');

        $result = DB::table('category')
                    ->where('id',$id)
                    ->delete();
        if($result){
            return redirect()->route('category.view');
        }  
    }
}
