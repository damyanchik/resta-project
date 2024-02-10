@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Edit product'" :h="3" />
    <div class="container my-3">
        <x-admin.page-form
            :action="route('admin.product.update', $product['id'])" :formMethod="'post'" :bladeMethod="'PUT'">
            <div class="row mb-4">
                <x-admin.input :name="'name'" :label="'Name'" type="text" value="{{ $product['name'] }}"/>
            </div>

            <div class="row mb-4">
                <x-admin.textarea :name="'description'" :label="'Description'">
                    {{ $product['description'] }}
                </x-admin.textarea>
            </div>

            <div class="row mb-4">
                <x-admin.input :name="'stock'" :label="'Stock'" type="number" value="{{ $product['stock'] }}"/>
                <x-admin.input
                    :name="'price'" :label="'Price'" type="number" step="0.01" value="{{ $product['formatted_price_to_form'] }}"/>
            </div>

            <div class="row mb-5 d-flex justify-content-center">
                <x-admin.input-checkbox
                    :name="'is_vegetarian'"
                    :label="'Vegetarian'"
                    :check="$product['is_vegetarian']"
                    :isHidden="1"
                />

                <x-admin.input-checkbox
                    :name="'is_spicy'"
                    :label="'Spicy'"
                    :check="$product['is_spicy']"
                    :isHidden="1"
                />

                <x-admin.input-checkbox
                    :name="'is_unlimited'"
                    :label="'Unlimited'"
                    :check="$product['is_unlimited']"
                    :isHidden="1"
                />
            </div>

            <x-admin.form-buttons :back="'admin.product.index'"/>
        </x-admin.page-form>
    </div>
@endsection
