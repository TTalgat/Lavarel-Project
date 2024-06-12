@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Books</h2>
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add New Book</a>
    @if(auth()->user()->role === 'supervisor')
        <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Add New Member</a>
    @endif
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
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('books.borrowers', $book->id) }}" class="btn btn-secondary">Borrowers</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
