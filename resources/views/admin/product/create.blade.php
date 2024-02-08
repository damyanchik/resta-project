@extends('admin.navbar')

@section('main')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create product</h1>
    </div>
    <div class="container my-3">
        <form action="{{ route('admin.product.store') }}" method="post">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <div class="form-floating">
                        <input name="name" type="text" class="form-control" id="name">
                        <label for="name">Name</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-floating">
                        <textarea name="description" class="form-control" id="description" rows="5"></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-floating">
                        <input name="stock" type="number" id="stock" class="form-control" />
                        <label for="stock">Stock</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input name="price" type="number" id="price" class="form-control" />
                        <label for="price">Price</label>
                    </div>
                </div>
            </div>

            <div class="row mb-5 d-flex justify-content-center">
                <div class="col">
                    <div class="form-floating">
                        <input
                            name="is_vegetarian"
                            class="form-check-input me-2"
                            type="checkbox"
                            value=""
                            id="form6Example8"
                        />
                        <label class="form-check-label" for="form6Example8">Vegetarian</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input
                            name="is_spicy"
                            class="form-check-input me-2"
                            type="checkbox"
                            value=""
                            id="form6Example8"
                        />
                        <label class="form-check-label" for="form6Example8">Spicy</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input
                            name="is_unlimited"
                            class="form-check-input me-2"
                            type="checkbox"
                            value=""
                            id="form6Example8"
                        />
                        <label class="form-check-label" for="form6Example8">Unlimited stock</label>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Create product</button>
            </div>
        </form>
    </div>
@endsection
