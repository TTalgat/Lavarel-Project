<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);


Route::resource('borrowings', BorrowingController::class);
Route::post('borrowings/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');