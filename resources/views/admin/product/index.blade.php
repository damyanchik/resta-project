@extends('admin.navbar')

@section('main')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
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
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Vegetarian</th>
                <th scope="col">Spicy</th>
                <th scope="col">Availability</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>
@endsection
