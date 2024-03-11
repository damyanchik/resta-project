@extends('admin.navbar')

@section('main')
    {{--  naglowek  --}}
    <div class="row mt-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-md-start align-items-end">
            <div>
                <h1 class="h2 float-md-start d-block-inline me-4">Title</h1>
                <x-listing.button.action.all></x-listing.button.action.all>
            </div>
            <x-listing.button.display.all></x-listing.button.display.all>
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

    <x-listing.table-part :data="$data" :flags="$flags"/>
@endsection
