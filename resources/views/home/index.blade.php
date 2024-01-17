@extends('layout')

@section('content')
    <div class="container mt-5">
        @include('partials.home._logo')
        <div class="row mt-5">
            @include('partials.home._promo-prod')
        </div>
    </div>
    <x-app-nav>
        <x-app-button type="button" iconSide="left" icon="fa-phone" name="contact" />
        <a href="/menu">
            <x-app-button type="button" iconSide="right" icon="fa-utensils" name="make order" />
        </a>
    </x-app-nav>
@endsection
