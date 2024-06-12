@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Book</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" class="form-control" id="publisher" value="{{ $book->publisher }}" required>
        </div>
        <div class="form-group">
            <label for="published_year">Published Year</label>
            <input type="number" name="published_year" class="form-control" id="published_year" value="{{ $book->published_year }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
