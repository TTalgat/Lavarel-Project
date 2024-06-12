<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingRecordController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Home Route
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Book Routes
    Route::resource('books', BookController::class);

    // Borrowing Records Routes
    Route::get('/borrow/{book}', [BorrowingRecordController::class, 'create'])->name('borrow.create');
    Route::post('/borrow', [BorrowingRecordController::class, 'store'])->name('borrow.store');
    Route::patch('/borrow/{borrowingRecord}/return', [BorrowingRecordController::class, 'returnBook'])->name('borrow.return');

    // Route for borrowers of a specific book
    Route::get('/books/{book}/borrowers', [BookController::class, 'borrowers'])->name('books.borrowers');

    // Routes for Members
    Route::prefix('members')->middleware('role:supervisor')->group(function () {
        Route::get('/create', [MemberController::class, 'create'])->name('members.create');
        Route::post('/', [MemberController::class, 'store'])->name('members.store');
        Route::get('/', [MemberController::class, 'index'])->name('members.index');
        Route::get('/{member}', [MemberController::class, 'show'])->name('members.show');
        Route::get('/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
        Route::put('/{member}', [MemberController::class, 'update'])->name('members.update');
        Route::delete('/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    });

    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});