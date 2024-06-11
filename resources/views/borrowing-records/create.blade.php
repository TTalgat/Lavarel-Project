@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Borrow Book</h2>
    <form action="{{ route('borrowing-records.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ request('book_id') }}">
        <div class="mb-3">
            <label for="borrowed_at" class="form-label">Borrowed At</label>
            <input type="date" class="form-control" id="borrowed_at" name="borrowed_at" value="{{ date('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
