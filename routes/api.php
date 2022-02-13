<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/article', [ArticleController::class, 'list'])->name('api.article.list');
Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('api.article.show');
Route::post('/article/add', [ArticleController::class, 'add'])->name('api.article.add');
Route::put('/article/edit/{id}', [ArticleController::class, 'edit'])->name('api.article.edit');
Route::delete('/article/delete/{id}', [ArticleController::class, 'delete'])->name('api.article.delete');

Route::get('/category', [CategoryController::class, 'list'])
->name('api.category.list');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])
->name('api.category.show');
Route::post('/category/add', [CategoryController::class, 'add'])
->name('api.category.add');
Route::put('/category/edit/{id}', [CategoryController::class, 'edit'])
->name('api.category.edit');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])
->name('api.category.delete');

