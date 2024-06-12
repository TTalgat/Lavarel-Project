@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Borrowers of "{{ $book->title }}"</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowers as $borrower)
                <tr>
                    <td>{{ $borrower->user->name }}</td>
                    <td>{{ $borrower->borrowed_at }}</td>
                    <td>{{ $borrower->returned_at ?? 'Not Returned' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
</div>
@endsection
