@extends('layout')

@section('content')
    <x-app-nav>
        <a href="/menu">
            <x-app-button type="button" iconSide="left" icon="fa-rotate-left" name="menu" />
        </a>
        <a href="/summary">
            <x-app-button type="button" iconSide="right" icon="fa-check" name="confirm" />
        </a>
    </x-app-nav>
@endsection
