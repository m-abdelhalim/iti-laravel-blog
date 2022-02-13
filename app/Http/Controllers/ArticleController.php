<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Nonstandard\Uuid;

class ArticleController extends Controller
{
    public function list_dash()
    {
        // return 'list of articles';
        $articles = Article::with('category')->paginate(10);
        return view('dashboard.pages.data', ['articles'=>$articles ]);
    }

    public function list()
    {
        // return 'list of articles';
        $articles = Article::with('category')->paginate(10);
        return view('article.list', ['articles'=>$articles ]);
    }
    public function add()
    {
        $categories = Category::all();
        return view('article.add', ['categories'=>$categories ]);
    }
    public function save(ArticleRequest $request)
    {
        // return $request;
        $isValid = $request->validated();
        $article = new Article;
        $article->name = $isValid['name'];
        $article->description = $isValid['description'];
        $article->cat_id = $isValid['category'];
        $article->slug= Uuid::uuid4();
        $article->save();
        return redirect()->route('article.list');
    }
    
    
    public function show($id)
    {
        $article = Article::where('id', '=', $id)->get()[0];
        if($article)
        {
            
            $category = $article->category;
            // return $category;
            return view('article.show', ['article'=> $article, 'category'=>$category->name]);

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
    public function saveChanges(ArticleRequest $request,$id)
    {
        // return $request->name;
        $isValid = $request->validated();
        // return $isValid;
        $article = Article::where('id', '=', $id)->get()[0];
        if($article)
        {
        $article->name = $isValid['name'];
        $article->description = $isValid['description'];
        $article->cat_id = $isValid['category'];
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
