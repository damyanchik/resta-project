@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Edit category'" :h="3"/>
    <div class="container my-3">
        <x-admin.page-form
            :action="route('admin.category.update', $category['id'])" :formMethod="'post'" :bladeMethod="'PUT'">
            <div class="row mb-4">
                <x-admin.input :name="'name'" :label="'Name'" type="text" value="{{ $category->name }}"/>
                <x-admin.input :name="'order'" :label="'Order'" type="number" value="{{ $category->order }}"/>
                <x-admin.input-checkbox
                    :name="'is_visible'"
                    :label="'Visible'"
                    :check="$category->is_visible"
                />
            </div>
            <x-admin.form-buttons :back="'admin.category.index'"/>
        </x-admin.page-form>
    </div>
@endsection
