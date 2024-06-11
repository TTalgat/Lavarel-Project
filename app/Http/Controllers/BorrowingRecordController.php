<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowingRecord;
use App\Models\User;
use App\Models\Book;
use Auth;

class BorrowingRecordController extends Controller
{
    public function index()
    {
        $records = BorrowingRecord::with(['user', 'book'])->get();
        return view('borrowing-records.index', compact('records'));
    }

    public function create(Request $request)
    {
        $book_id = $request->query('book_id');
        return view('borrowing-records.create', compact('book_id'));
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

    public function show(BorrowingRecord $borrowingRecord)
    {
        return view('borrowing-records.show', compact('borrowingRecord'));
    }

    public function edit(BorrowingRecord $borrowingRecord)
    {
        $users = User::all();
        $books = Book::all();
        return view('borrowing-records.edit', compact('borrowingRecord', 'users', 'books'));
    }

    public function update(Request $request, BorrowingRecord $borrowingRecord)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
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