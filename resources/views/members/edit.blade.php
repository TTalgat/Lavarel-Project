@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Member</h2>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
        </div>
        <div class="mb-3">
            <label for="pass_no" class="form-label">Passport No</label>
            <input type="text" class="form-control" id="pass_no" name="pass_no" value="{{ $member->pass_no }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" required>{{ $member->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Information</label>
            <input type="text" class="form-control" id="contact_info" name="contact_info" value="{{ $member->contact_info }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
