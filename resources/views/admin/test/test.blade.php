@extends('admin.navbar')

@section('main')
    {{--  naglowek  --}}
    <div class="row mt-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-md-start align-items-end">
            <div>
                <h1 class="h2 float-md-start d-block-inline me-4">Title</h1>
                <div class="btn-toolbar">
                    <div class="btn-group m-1 me-2">
                        <button type="button" class="btn btn-sm btn-secondary">Create</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle m-1 me-2 position-relative" id="operations"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Operations
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                            11
                        </span>
                    </button>
                    <ul class="dropdown-menu small" aria-labelledby="operations">
                        <li><a class="dropdown-item small" href="#">Delete</a></li>
                        <li><a class="dropdown-item small" href="#">Change to...</a></li>
                        <li><a class="dropdown-item small" href="#">Bla bla</a></li>
                    </ul>

                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle m-1 me-2 position-relative" id="export"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Export
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                            10
                        </span>
                    </button>
                    <ul class="dropdown-menu small" aria-labelledby="export">
                        <li>
                            <a class="dropdown-item small" href="#">
                                <i class="fa-solid fa-file-pdf d-inline-block p-1"></i>
                                <span class="d-inline-block p-1">.pdf</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item small" href="#">
                                <i class="fa-solid fa-file-excel d-inline-block p-1"></i>
                                <span class="d-inline-block p-1">.xls</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item small" href="#">
                                <i class="fa-solid fa-file-csv d-inline-block p-1"></i>
                                <span class="d-inline-block p-1">.csv</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{--       podzial         --}}
            <div class="btn-toolbar mt-2 mt-md-0 flex-row-reverse">

                {{--        clear filters       --}}
                <div class="btn-group m-1 me-1">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-regular fa-trash-can"></i></button>
                </div>
                {{--        range        --}}
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle m-1 me-1" id="date"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Range
                </button>
                <ul class="dropdown-menu small" aria-labelledby="date">
                    <li>
                        <a class="dropdown-item small" href="#">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                   value="option1">
                            <label class="form-check-label" for="exampleRadios1">
                                Last week
                            </label>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small" href="#">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                   value="option2">
                            <label class="form-check-label" for="exampleRadios1">
                                Last month
                            </label>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small" href="#">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                   value="option1">
                            <label class="form-check-label" for="exampleRadios1">
                                Last year
                            </label>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small" href="#">Choose data</a>
                    </li>
                </ul>

                {{--    filter     --}}
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle m-1 me-1" id="filter"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Filter
                </button>
                <ul class="dropdown-menu small" aria-labelledby="filter">
                    <li>
                        <a class="dropdown-item small" href="#">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small" href="#">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Brand</label>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small" href="#">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Name</label>
                            </div>
                        </a>
                    </li>
                </ul>

                {{--    visible     --}}
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle m-1 me-1" id="visible"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Visible
                </button>
                <ul class="dropdown-menu" aria-labelledby="visible">
                    <li>
                        <a class="dropdown-item small" href="#">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                       checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                                    input</label>
                            </div>
                        </a>
                    </li>
                    <li><a class="dropdown-item small" href="#">Column 2</a></li>
                    <li><a class="dropdown-item small" href="#">Column 3</a></li>
                </ul>

                {{--   search   --}}
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle m-1 me-1" id="searchable"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Search
                </button>
                <ul class="dropdown-menu small" aria-labelledby="searchable">
                    <li>
                        <a class="dropdown-item small" href="#">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Every column</label>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item small" href="#">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Select</option>
                                <option value="1">ID</option>
                                <option value="2">Name</option>
                                <option value="3">Lastname</option>
                            </select>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{--  search, per page  --}}

    <div class="row">
        <form method="get" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 mt-3">
            <div class="input-group mt-2 mt-md-0" style="width: 27vh">
                <input type="text" name="search" class="form-control" placeholder="Search..."
                       value="{{ request()->input(['search']) }}">
                <button type="submit" class="btn btn-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="input-group ms-auto mt-2 mt-md-0" style="width: 7.3rem;">
                <label class="input-group-text">
                    <i class="fa-solid fa-list-ol text-secondary"></i>
                </label>
                <select name="display" class="form-select text-secondary" onchange="$(this).closest('form').submit();">
                    <option value="15" {{ request()->input(['display']) == 15 ? 'selected' : '' }}>15</option>
                    <option value="30" {{ request()->input(['display']) == 30 ? 'selected' : '' }}>30</option>
                    <option value="60" {{ request()->input(['display']) == 60 ? 'selected' : '' }}>60</option>
                    <option value="120" {{ request()->input(['display']) == 120 ? 'selected' : '' }}>120</option>
                </select>
            </div>
            <input name="column" value="{{ request()->input(['column']) }}" readonly hidden>
            <input name="order" value="{{ request()->input(['orderDirection']) }}" onchange="$(this).closest('form').submit();"
                   readonly hidden>
        </form>
    </div>

    {{--  Tabela  --}}
    <x-listing.table-part :model="$model" :listing="$listing" />
@endsection
