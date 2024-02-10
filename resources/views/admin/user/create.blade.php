@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Create user'" :h="2"/>

    <div class="container my-3">
        <x-admin.page-form :action="route('admin.user.store')" :formMethod="'post'" :bladeMethod="'POST'">
            <div class="row mb-4">
                <x-admin.input :name="'name'" :label="'Name'" type="text"/>
                <x-admin.input :name="'surname'" :label="'Surname'" type="text"/>
            </div>

            <div class="row mb-4">
                <x-admin.input :name="'email'" :label="'Email'" type="email"/>
                <x-admin.input :name="'password'" :label="'Password'" type="password"/>
            </div>

            <x-admin.form-buttons :back="'admin.user.index'"/>
        </x-admin.page-form>
    </div>
@endsection
