<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/article', [ArticleController::class, 'list'])->middleware(['auth' ,'is_admin'])->name('article.list');
Route::get('/article/show/{id}', [ArticleController::class, 'show'])->middleware(['auth' ,'is_admin'])->name('article.show');
Route::get('/article/add', [ArticleController::class, 'add'])->middleware(['auth' ,'is_admin', 'older_than_30'])->name('article.add');
Route::post('/article/save', [ArticleController::class, 'save'])->middleware(['auth' ,'is_admin', 'older_than_30'])->name('article.save');
Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->middleware(['auth' ,'is_admin', 'older_than_30'])->name('article.edit');
Route::put('/article/saveCahange/{id}', [ArticleController::class, 'saveChanges'])->middleware(['auth' ,'is_admin', 'older_than_30'])->name('article.saveChanges');
Route::delete('/article/delete/{id}', [ArticleController::class, 'delete'])->middleware(['auth' ,'is_admin', 'older_than_30'])->name('article.delete');
Route::get('/article/deleteConfirm/{id}', [ArticleController::class, 'deleteConfirm'])->middleware(['auth' ,'is_admin', 'older_than_30'])->name('article.deleteConfirm');
