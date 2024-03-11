@php
    $item = $data->items()[0];
@endphp
<div class="table-responsive">
    <table class="table bg-white table-hover table-bordered rounded small">
        <thead>
        <tr class="bg-light text-secondary text-uppercase">
            <th class="p-2" scope="col" style="width: 2rem">
                <i class="fa-solid fa-square-check"></i>
            </th>
            @foreach(array_keys($item->getAttributes()) as $header)
                <th class="p-2" scope="col">
                    <small class="me-2">{{ $header }}</small>
                </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $dotum)
            <tr>
                <th scope="row" class="bg-light p-2">
                    <input type="checkbox">
                </th>
            @foreach ($dotum->toArray() as $value)
                <td class="p-2">{{ $value }}</td>
            @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
