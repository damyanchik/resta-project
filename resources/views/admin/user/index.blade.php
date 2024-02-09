@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Users'" />
    <x-admin.index-table-manager
        :collection="$users" :headers="['Id', 'Name', 'Surname', 'Email', 'Active', 'Role', 'Action']">
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
    </x-admin.index-table-manager>
@endsection
