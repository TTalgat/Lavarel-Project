<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowingRecord;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $borrowedBooks = BorrowingRecord::with('book')->where('user_id', Auth::id())->get();

        return view('home', compact('books', 'borrowedBooks'));
    }
}