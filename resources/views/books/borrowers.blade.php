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
            @foreach($borrowers as $borrow)
                <tr>
                    <td>{{ $borrow->user->name }}</td>
                    <td>{{ $borrow->borrowed_at }}</td>
                    <td>{{ $borrow->returned_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
</div>
@endsection
