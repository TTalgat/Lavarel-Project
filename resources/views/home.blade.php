@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Books</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Year</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->category }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-info">View</a>
                        <a href="{{ route('borrowing-records.create', ['book_id' => $book->id]) }}" class="btn btn-success">Borrow</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>My Borrowed Books</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowedBooks as $record)
                <tr>
                    <td>{{ $record->book->id }}</td>
                    <td>{{ $record->book->title }}</td>
                    <td>{{ $record->book->author }}</td>
                    <td>{{ $record->borrowed_at }}</td>
                    <td>{{ $record->returned_at ?? 'Not Returned' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
