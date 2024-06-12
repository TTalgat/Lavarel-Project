@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Members</h2>
    <a href="{{ route('members.create') }}" class="btn btn-success mb-3">Add New Member</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Passport No</th>
                <th>Address</th>
                <th>Contact Info</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->pass_no }}</td>
                    <td>{{ $member->address }}</td>
                    <td>{{ $member->contact_info }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
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
