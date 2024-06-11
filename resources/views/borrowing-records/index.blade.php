@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Borrowing Records</h2>
    <a href="{{ route('borrowing-records.create') }}" class="btn btn-success mb-3">Add New Record</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Book</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->user->name }}</td>
                    <td>{{ $record->book->title }}</td>
                    <td>{{ $record->borrowed_at }}</td>
                    <td>{{ $record->returned_at }}</td>
                    <td>
                        <a href="{{ route('borrowing-records.show', $record) }}" class="btn btn-info">View</a>
                        <a href="{{ route('borrowing-records.edit', $record) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('borrowing-records.destroy', $record) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
