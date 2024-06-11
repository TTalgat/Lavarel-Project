@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Borrowing Record Details</h2>
    <div class="card">
        <div class="card-header">
            Record ID: {{ $record->id }}
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $record->user->name }}</p>
            <p><strong>Book:</strong> {{ $record->book->title }}</p>
            <p><strong>Borrowed At:</strong> {{ $record->borrowed_at }}</p>
            <p><strong>Returned At:</strong> {{ $record->returned_at }}</p>
            <a href="{{ route('borrowing-records.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
