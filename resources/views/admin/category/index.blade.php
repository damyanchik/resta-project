@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Categories'" />
    <x-admin.index-table-manager
        :collection="$categories" :headers="['Id', 'Name', 'Products', 'Order', 'Visible', 'Action']">
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->product->count() }}</td>
                <td>{{ $category->orderDirection }}</td>
                <td><x-admin.no-yes-badge :boolean="$category->is_visible"/></td>
                <td><a href="{{ route('admin.category.edit', $category->id) }}" class="btn">Open</a></td>
            </tr>
        @endforeach
    </x-admin.index-table-manager>
@endsection
