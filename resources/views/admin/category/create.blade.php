@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Create category'" :h="3"/>
    <div class="container my-3">
        <x-admin.page-form
            :action="route('admin.category.create')" :formMethod="'post'" :bladeMethod="'POST'">
            <div class="row mb-4">
                <x-admin.input :name="'name'" :label="'Name'" type="text" value=""/>
                <x-admin.input :name="'orderDirection'" :label="'Order'" type="number" value=""/>
                <x-admin.input-checkbox
                    :name="'is_visible'"
                    :label="'Visible'"
                    :check="0"
                />
            </div>
            <x-admin.form-buttons :back="'admin.category.index'"/>
        </x-admin.page-form>
    </div>
@endsection
