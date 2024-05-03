<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\darshilController as darshilController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('page', darshilController::class)
                ->middleware('auth')->except(['index','show']);
Route::resource('page', darshilController::class)->only(['index' , 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
