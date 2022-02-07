<?php

use App\Http\Controllers\CategoryController;
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
Route::get('/category', [CategoryController::class, 'list'])->name('category.list');

Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/add', [CategoryController::class, 'add'])->name('category.add');
Route::post('/category/save', [CategoryController::class, 'save'])->name('category.save');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/saveCahange/{id}', [CategoryController::class, 'saveChanges'])->name('category.saveChanges');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/category/deleteConfirm/{id}', [CategoryController::class, 'deleteConfirm'])->name('category.deleteConfirm');


