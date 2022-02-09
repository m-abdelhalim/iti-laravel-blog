<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
DB::listen(function($sql) {
    Log::info($sql->sql);
    Log::info($sql->bindings);
    Log::info($sql->time);
});
Route::get('/test',function(){
    $c = collect(['a','b','a','a','b']);
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
    });
});
Route::redirect('/', 'category');
