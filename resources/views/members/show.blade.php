@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Member Details</h2>
    <div class="card">
        <div class="card-header">
            {{ $member->name }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>Passport No:</strong> {{ $member->pass_no }}</p>
            <p><strong>Address:</strong> {{ $member->address }}</p>
            <p><strong>Contact Information:</strong> {{ $member->contact_info }}</p>
            <a href="{{ route('members.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
