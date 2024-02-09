@extends('admin.navbar')

@section('main')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Active</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user['id'] }}</th>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['surname'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['is_active'] }}</td>
                    <td>{{ $user['role_id'] }}</td>
                    <td><a href="{{ route('admin.user.edit', $user['id']) }}" class="btn">Show</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
