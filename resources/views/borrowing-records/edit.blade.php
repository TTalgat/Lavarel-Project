@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Borrowing Record</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrowing-records.update', $borrowingRecord->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $borrowingRecord->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select class="form-control" id="book_id" name="book_id" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $borrowingRecord->book_id == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="borrowed_at" class="form-label">Borrowed At</label>
            <input type="date" class="form-control" id="borrowed_at" name="borrowed_at" value="{{ $borrowingRecord->borrowed_at->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="returned_at" class="form-label">Returned At</label>
            <input type="date" class="form-control" id="returned_at" name="returned_at" value="{{ $borrowingRecord->returned_at ? $borrowingRecord->returned_at->format('Y-m-d') : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
