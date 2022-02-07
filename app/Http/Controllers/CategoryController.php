<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Article;
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
    public function save(CategoryRequest $request)
    {
        // return $request;
        $isValid = $request->validated();
        
        $category = new Category;
        $category->name = $isValid['name'];
        $category->save();
        return redirect()->route('category.list');
    }
    
    
    public function show($id)
    {
        $category = Category::where('id', '=', $id)->get()[0];
        if($category)
        {
            // $articles = Article::where('cat_id', '=', $category->id)->get();
            $articles = $category->articles;
            // return $articles;
        return view('category.show', ['category'=> $category, 'articles'=>$articles]);

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
    public function saveChanges(CategoryRequest $request,$id)
    {
        // return $isValid['name'];
        $isValid = $request->validated();
        $category = Category::where('id', '=', $id)->get()[0];
        if($category)
        {
        $category->name = $isValid['name'];
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
