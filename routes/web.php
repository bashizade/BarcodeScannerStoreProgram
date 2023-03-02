<?php

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

Route::get('/',function (){
    return redirect(\route('login'));
});

Route::get('/login',\App\Http\Livewire\Dashboard\Auth::class)->name('login');

Route::get('/logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
})->name('logout');

Route::prefix('/dashboard')->middleware('auth')->group(function (){
    Route::get('/index',\App\Http\Livewire\Dashboard\Index::class)->name('dashboard.index');
    Route::get('/products',\App\Http\Livewire\Dashboard\Products::class)->name('dashboard.products');
    Route::get('/selling',\App\Http\Livewire\Dashboard\Selling::class)->name('dashboard.selling');
});
