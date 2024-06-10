<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Member;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('book', 'member')->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('borrowings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
        ]);

        Borrowing::create($request->all());
        return redirect()->route('borrowings.index')->with('success', 'Book borrowed successfully.');
    }

    public function returnBook(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:borrowings,book_id',
            'member_id' => 'required|exists:borrowings,member_id',
        ]);

        $borrowing = Borrowing::where('book_id', $request->book_id)
            ->where('member_id', $request->member_id)
            ->first();

        if ($borrowing) {
            $borrowing->update(['return_date' => now()]);
            return redirect()->route('borrowings.index')->with('success', 'Book returned successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Borrowing record not found.']);
        }
    }
}