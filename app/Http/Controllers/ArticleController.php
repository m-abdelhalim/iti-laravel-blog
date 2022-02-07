<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Nonstandard\Uuid;

class ArticleController extends Controller
{
    public function list()
    {
        // return 'list of articles';
        $articles = Article::all();
        return view('article.list', ['articles'=>$articles ]);
    }
    public function add()
    {
        $categories = Category::all();
        return view('article.add', ['categories'=>$categories ]);
    }
    public function save(Request $request)
    {
        // return $request;
        $article = new Article;
        $article->name = $request->name;
        $article->description = $request->description;
        $article->cat_id = $request->category;
        $article->slug= Uuid::uuid4();
        $article->save();
        return redirect()->route('article.list');
    }
    
    
    public function show($id)
    {
        $article = Article::where('id', '=', $id)->get();
        if($article)
        {
            $category = Category::where('id', '=', $article[0]->cat_id)->get()[0];
            return view('article.show', ['article'=> $article[0], 'category'=>$category->name]);

        }
    }
    public function edit($id)
    {
        $categories = Category::all();
        $article = Article::where('id', '=', $id)->get();
        if($article)
        {
            return view('article.edit', ['article'=> $article[0], 'categories'=>$categories]);

        }
    }
    public function saveChanges(Request $request,$id)
    {
        // return $request->name;
        $article = Article::where('id', '=', $id)->get()[0];
        if($article)
        {
        $article->name = $request->name;
        $article->description = $request->description;
        $article->cat_id = $request->category;
        $article->save();
        return redirect()->route('article.list');
        }
    }
    public function delete($id)
    {
        $article = Article::where('id', '=', $id)->get()[0];
        if($article)
        {
            $article->delete();

        }
        return redirect()->route('article.list');
    }
    public function deleteConfirm($id)
    {
        $article = Article::where('id', '=', $id)->get();
        if($article)
        {
            return view('article.deleteConfirm', ['article'=> $article[0]]);

        }
    }
    
}
