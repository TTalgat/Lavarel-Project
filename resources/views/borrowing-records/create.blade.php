@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Borrow Book: {{ $book->title }}</h2>
    <form action="{{ route('borrow.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <div class="mb-3">
            <label for="user_id" class="form-label">Select User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="borrowed_at" class="form-label">Borrowed At</label>
            <input type="datetime-local" class="form-control" id="borrowed_at" name="borrowed_at" value="{{ now()->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Confirm Borrow</button>
    </form>
</div>
@endsection
