<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyblogController as MyBlogController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/groups', [MyblogController::class,'getUserGroup'])->name('myblog.usergroup');
Route::get('/myblog/recyclebin', [MyblogController::class,'recyclebin'])->name('myblog.recyclebin');
Route::post('/myblog/recover/{id}', [MyblogController::class,'recover'])->name('myblog.recover');


Route::resource('myblog', MyblogController::class)
    ->middleware('throttle:10,3');

Route::resource('comments', CommentsController::class)->only(['store','destroy']);
