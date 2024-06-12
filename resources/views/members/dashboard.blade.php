@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Available Books</h2>
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
                    <td>{{ $book->category->name }}</td>
                    <td>
                        <form action="{{ route('books.borrow', $book) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Borrow</button>
                        </form>
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
                <th>Actions</th>
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
                    <td>
                        @if(!$record->returned_at)
                            <form action="{{ route('books.return', $record->book) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Return</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
