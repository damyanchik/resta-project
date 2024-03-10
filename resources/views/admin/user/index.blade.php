@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Users'" />
    <x-admin.index-table-manager
        :collection="$data" :headers="['Id', 'Name', 'Surname', 'Email', 'Active', 'Role', 'Action']">
            @foreach($data as $datum)
                <tr>
                    <th scope="row">{{ $datum['id'] }}</th>
                    <td>{{ $datum['name'] }}</td>
                    <td>{{ $datum['surname'] }}</td>
                    <td>{{ $datum['email'] }}</td>
                    <td>{{ $datum['is_active'] }}</td>
                    <td>{{ $datum['role_id'] }}</td>
                    <td><a href="{{ route('admin.user.edit', $datum['id']) }}" class="btn">Show</a></td>
                </tr>
            @endforeach
    </x-admin.index-table-manager>
@endsection
