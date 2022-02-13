<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Nonstandard\Uuid;

class ArticleController extends Controller
{
    
    public function list()
    {
        // return 'list of articles';
        $articles = Article::paginate(10);
        return response()->json($articles);
    }
    
    public function add(ArticleRequest $request)
    {
        // return $request;
        // $request['_token' = csrf_token();
        $isValid = $request->validated();
        $article = new Article;
        $article->name = $isValid['name'];
        $article->description = $isValid['description'];
        $article->cat_id = $isValid['category'];
        $article->slug= Uuid::uuid4();
        $article->save();
        return response()->json(['success'=>"product was added successfully!"]);
    }
    
    
    public function show($id)
    {
        $article = Article::where('id', '=', $id)->first();
        // dd($article);
        if($article)
        {
            return response()->json($article);
        }
        else
        {
            $res = ['error' => "There is no article with id=$id"];
            return response()->json($res);

        }
    }
    
    public function edit(ArticleRequest $request,$id)
    {
        // return $request->name;
        $isValid = $request->validated();
        // return $isValid;
        $article = Article::where('id', '=', $id)->first();
        if($article)
        {
        $article->name = $isValid['name'];
        $article->description = $isValid['description'];
        $article->cat_id = $isValid['category'];
        $article->save();
        return response()->json(['success'=>"product was edited successfully!"]);
        }
        else
        {
            return response()->json(['error'=>"There is no article with id=$id"]);

        }
    }
    
    public function delete($id)
    {
        $article = Article::where('id', '=', $id)->first();
        if($article)
        {
            $article->delete();
            return response()->json(['success'=>"product was deleted successfully!"]);
        }
        else
        {
            return response()->json(['error'=>"There is no article with id=$id"]);

        }
    }
}
