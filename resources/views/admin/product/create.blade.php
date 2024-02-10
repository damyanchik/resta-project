@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Create product'" :h="2" />
    <div class="container my-3">
        <x-admin.page-form :action="route('admin.product.store')" :formMethod="'post'" :bladeMethod="'POST'">
            <div class="row mb-4">
                <x-admin.input :name="'name'" :label="'Name'" type="text"/>
            </div>

            <div class="row mb-4">
                <x-admin.textarea :name="'description'" :label="'Description'"></x-admin.textarea>
            </div>

            <div class="row mb-4">
                <x-admin.input :name="'stock'" :label="'Stock'" type="number"/>
                <x-admin.input :name="'price'" :label="'Price'" type="number" step="0.01"/>
            </div>

            <div class="row mb-5 d-flex justify-content-center">
                <x-admin.input-checkbox
                    :name="'is_vegetarian'"
                    :label="'Vegetarian'"
                    :check="0"
                />
                <x-admin.input-checkbox
                    :name="'is_spicy'"
                    :label="'Spicy'"
                    :check="0"
                />
                <x-admin.input-checkbox
                    :name="'is_unlimited'"
                    :label="'Unlimited'"
                    :check="0"
                />
            </div>

            <x-admin.form-buttons :back="'admin.product.index'"/>
        </x-admin.page-form>
    </div>
@endsection
