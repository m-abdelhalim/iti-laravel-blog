<?php

namespace App\Http\Controllers\Api;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        // return 'list of categories';
        $categories = Category::paginate(10);
        return response()->json($categories);
    }
    
    public function add(CategoryRequest $request)
    {
        // return $request;
        $isValid = $request->validated();
        
        $category = new Category;
        $category->name = $isValid['name'];
        $category->save();
        return response()->json(['success'=>"category was added successfully!"]);

    }


    public function show($id)
    {
        $category = Category::where('id', '=', $id)->first();
        if ($category) {
            $articles = PaginationHelper::paginate( collect(),10);
            
            return response()->json([
                'category'=>$category,
                'related-articles' => $articles]);
        }
    }
    
    public function edit(CategoryRequest $request, $id)
    {
        // return $isValid['name'];
        $isValid = $request->validated();
        $category = Category::where('id', '=', $id)->first();
        if ($category) {
            $category->name = $isValid['name'];
            $category->save();
            return response()->json(['success'=>"category was edited successfully!"]);
        }
        else
        {
            return response()->json(['error'=>"There is no category with id=$id"]);

        }
    }
    public function delete($id)
    {
        $category = Category::where('id', '=', $id)->first();
        if ($category) {
            $category->delete();
            return response()->json(['success'=>"category was deleted successfully!"]);
        }
        else
        {
            return response()->json(['error'=>"There is no category with id=$id"]);

        }
    }
   
}
