@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Products'" />
    <x-admin.index-table-manager
        :collection="$products" :headers="['Id', 'Name', 'Stock', 'Price', 'Vegetarian', 'Spicy', 'Available', 'Action']">
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product['id'] }}</th>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['formatted_stock'] }}</td>
                <td>{{ $product['formatted_price'] }}</td>
                <td>{{ $product['is_vegetarian'] }}</td>
                <td>{{ $product['is_spicy'] }}</td>
                <td>{{ $product['formatted_is_available'] }}</td>
                <td><a href="{{ route('admin.product.edit', $product['id']) }}" class="btn">Show</a></td>
            </tr>
        @endforeach
    </x-admin.index-table-manager>
@endsection
