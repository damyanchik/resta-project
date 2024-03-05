@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Products'" />
    <x-admin.index-table-manager
        :collection="$products"
        :headers="['Id', 'Name', 'Stock', 'Price', 'Category', 'Order', 'Vege', 'Spicy', 'Available', 'Action']">
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->formatted_stock }}</td>
                <td>{{ $product->formatted_price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->orderDirection }}</td>
                <td><x-admin.no-yes-badge :boolean="$product->is_vegetarian"/></td>
                <td><x-admin.no-yes-badge :boolean="$product->is_spicy"/></td>
                <td><x-admin.is-available-badge :boolean="$product->is_available"/></td>
                <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn">Show</a></td>
            </tr>
        @endforeach
    </x-admin.index-table-manager>
@endsection
