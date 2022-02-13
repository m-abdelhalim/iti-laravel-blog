<?php

use App\Http\Controllers\ArticleController;
use App\Mail\NewUserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
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
Route::get('/email', function(){
    Mail::to(auth()->user()->email)->send(new NewUserNotification);
    return view('email.newUser');

})->middleware('auth');
Route::get('/test',function(){
    // dd(date_diff( now()->subYears(30)->format('Y-m-d') , '2000-01-01'));
    $d1 = Carbon::createFromFormat('Y-m-d', now()->format('Y-m-d'));
    $d2 = Carbon::createFromFormat('Y-m-d', '1990-01-01');
    if($d1->diffInYears($d2) >= 30)
        dd($d1->diffInYears($d2));
    else
        dd('< 30 ');
    /* $c = collect(['a','b','a','a','b']);
    // $c->duplicates()->dump();
    $c->each(function($item, $key){
        var_dump($item . $key);
    });
    $c2 = collect([['a', 1], ['b', 2], ['c', 3]]);
    $c2->eachSpread(function($name, $age){
        if($age > 1)
        {
            var_dump($name);
            return false;
        }
    }); */
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/template', [ArticleController::class, 'list_dash']);

/* 
Route::get('/template', function(){
    return view('dashboard.pages.data');
})
*/