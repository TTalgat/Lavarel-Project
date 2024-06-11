<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingRecordController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);

    Route::middleware(['role:supervisor'])->group(function () {
        Route::resource('volunteers', VolunteerController::class);
    });

    Route::middleware(['role:volunteer,supervisor'])->group(function () {
        Route::resource('borrowing-records', BorrowingRecordController::class);
    });

    // Ensure this route is inside the auth middleware
    Route::get('books/{book}/borrowers', [BookController::class, 'borrowers'])->name('books.borrowers');
});

Route::middleware(['auth', 'role:volunteer,supervisor'])->group(function () {
    Route::resource('borrowing-records', BorrowingRecordController::class);
});