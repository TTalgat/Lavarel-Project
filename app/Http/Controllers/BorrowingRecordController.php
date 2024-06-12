<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowingRecord;
use App\Models\Book;
use App\Models\User;
use Auth;

class BorrowingRecordController extends Controller
{
    // Display form to create a new borrowing record
    public function index()
    {
        $borrowingRecords = BorrowingRecord::with('book', 'user')->get();
        return view('borrowing-records.index', compact('borrowingRecords'));
    }

    public function create(Book $book)
    {
        return view('borrowing-records.create', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
        ]);

        BorrowingRecord::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'borrowed_at' => $request->borrowed_at,
        ]);

        return redirect()->route('home')->with('success', 'Book borrowed successfully.');
    }

    public function returnBook(BorrowingRecord $borrowingRecord)
    {
        $borrowingRecord->update(['returned_at' => now()]);

        return redirect()->route('home')->with('success', 'Book returned successfully.');
    }
    // Other CRUD methods if necessary


    public function show(BorrowingRecord $borrowingRecord)
    {
        return view('borrowing-records.show', compact('borrowingRecord'));
    }

    public function edit(BorrowingRecord $borrowingRecord)
    {
        $books = Book::all();
        $users = User::all();
        return view('borrowing-records.edit', compact('borrowingRecord', 'books', 'users'));
    }

    public function update(Request $request, BorrowingRecord $borrowingRecord)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'returned_at' => 'nullable|date',
        ]);

        $borrowingRecord->update($request->all());

        return redirect()->route('borrowing-records.index')->with('success', 'Borrowing record updated successfully.');
    }

    public function destroy(BorrowingRecord $borrowingRecord)
    {
        $borrowingRecord->delete();
        return redirect()->route('borrowing-records.index')->with('success', 'Borrowing record deleted successfully.');
    }
}