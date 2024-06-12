@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Borrowing Records</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Book</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->user->name }}</td>
                    <td>{{ $record->book->title }}</td>
                    <td>{{ $record->borrowed_at }}</td>
                    <td>{{ $record->returned_at ?? 'Not Returned' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
