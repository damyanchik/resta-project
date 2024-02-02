@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row mx-4 mx-md-none">
            <div class="col-10 col-md-5 py-2 mx-auto mx-md-none app_theme_org rounded" style="height: 75vh">
                <div class="rounded app_theme_wht" style="height: 100vh; max-height: 63vh;">
                    <ul class="overflow-auto list-unstyled" style="height: 99%;">
                        <li class="list-group-item list-group-item-action px-3 border-0" style="cursor: pointer">
                            The current item
                        </li>
                        <li class="list-group-item list-group-item-action px-3 border-0">
                            A second item
                        </li>
                        <li class="list-group-item list-group-item-action px-3 border-0">
                            A third item
                        </li>
                        <li class="list-group-item list-group-item-action px-3 border-0">
                            A fourth item
                        </li>
                        <li class="list-group-item list-group-item-action px-3 border-0">
                            A disabled item
                        </li>
                    </ul>
                    <div class="input-group">
                        <input type="text" class="form-control focus-border" aria-describedby="search-input" style="height: 5vh">
                        <span class="input-group-text" id="search-input" style="height: 5vh">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-4">obrazek</div>
            <div class="col-3">zamowienie</div>
        </div>
    </div>

    <x-app-nav>
        <a href="/">
        <x-app-button type="button" iconSide="left" icon="fa-ban" name="cancel" />
        </a>
        <a href="/order">
            <x-app-button type="button" iconSide="right" icon="fa-utensils" name="order" />
        </a>
    </x-app-nav>
@endsection
