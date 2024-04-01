<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@create')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@store')->name('register');

Route::get('login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@store')->name('login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@destroy')->name('logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/index', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::post('/store', [SubscriptionController::class, 'store'])->name('subscription.store');
    Route::get('/edit/{id}', [SubscriptionController::class, 'edit'])->name('subscription.edit');
    Route::get('/create', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::put('/update/{id}', [SubscriptionController::class, 'update'])->name('subscription.update');
    Route::delete('/destroy/{id}', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
});

Route::get('/subscriptions/{id}', [SubscriptionController::class, 'show']);

