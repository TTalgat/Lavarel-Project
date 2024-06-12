@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" id="author" required>
        </div>
        <div class="form-group mb-3">
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" class="form-control" id="publisher" required>
        </div>
        <div class="form-group mb-3">
            <label for="published_year">Published Year</label>
            <input type="number" name="published_year" class="form-control" id="published_year" required>
        </div>
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Book</button>
    </form>
</div>
@endsection
