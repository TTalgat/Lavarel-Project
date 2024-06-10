@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book Details</h2>
    <div class="card">
        <div class="card-header">
            {{ $book->title }}
        </div>
        <div class="card-body">
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Publisher:</strong> {{ $book->publisher_name }}</p>
            <p><strong>Year:</strong> {{ $book->published_year }}</p>
            <p><strong>Category:</strong> {{ $book->category }}</p>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
