<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        // return 'list of categories';
        $categories = Category::all();
        return view('category.list', ['categories'=>$categories ]);
    }
    public function add()
    {
        return view('category.add');
    }
    public function save(Request $request)
    {
        // return $request;
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.list');
    }
    
    
    public function show($id)
    {
        $category = Category::where('id', '=', $id)->get();
        if($category)
        {
        return view('category.show', ['category'=> $category[0]]);

        }
    }
    public function edit($id)
    {
        $category = Category::where('id', '=', $id)->get();
        if($category)
        {
            return view('category.edit', ['category'=> $category[0]]);

        }
    }
    public function saveChanges(Request $request,$id)
    {
        // return $request->name;
        $category = Category::where('id', '=', $id)->get()[0];
        if($category)
        {
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.list');
        }
    }
    public function delete($id)
    {
        $category = Category::where('id', '=', $id)->get()[0];
        if($category)
        {
            $category->delete();

        }
        return redirect()->route('category.list');
    }
    public function deleteConfirm($id)
    {
        $category = Category::where('id', '=', $id)->get();
        if($category)
        {
            return view('category.deleteConfirm', ['category'=> $category[0]]);

        }
    }
    
    
    
    
    
    
}
