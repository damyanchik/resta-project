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
