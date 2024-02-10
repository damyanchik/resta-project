@extends('admin.navbar')

@section('main')
    <x-admin.page-header :title="'Edit user'" :h="3"/>

    <div class="container-fluid my-3">
        <x-admin.page-form :action="route('admin.user.update', $user['id'])" :formMethod="'post'" :bladeMethod="'PUT'">
            <div class="row mb-4">
                <x-admin.input :name="'name'" :label="'Name'" type="text" value="{{ $user['name'] }}"/>
                <x-admin.input :name="'surname'" :label="'Surname'" type="text" value="{{ $user['surname'] }}"/>
            </div>

            <div class="row mb-4">
                <x-admin.input :name="'email'" :label="'Email'" type="email" value="{{ $user['email'] }}"/>
                <x-admin.input :name="''" :label="'Password'" type="password"/>
            </div>

            <x-admin.form-buttons :back="'admin.user.index'"/>
        </x-admin.page-form>
    </div>
@endsection
