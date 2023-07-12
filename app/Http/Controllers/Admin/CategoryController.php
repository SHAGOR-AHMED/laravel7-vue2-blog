<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories
        ],200);
        //return $categories;
    }

   
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $cat = new Category;
        $cat->name = $request->name;
        $cat->slug = $request->name;
        $cat->status = $request->status;
        $cat->save();

    }

    public function show($id){

        $category = Category::find($id);
        return response()->json(['category'=>$category],200);
        
    }

    public function update(Request $request)
    {
        $cat = Category::find($request->id);
        $cat->name = $request->name;
        $cat->slug = $request->name;
        $cat->status = $request->status;

        if($cat->save()){
            $success = true;
        }else{
            $success = false;
        }

        return response()->json(['success'=>$success],200);

    }

    public function destroy($id){

        $category = Category::find($id);
        $category->delete();

    }

    
    
}