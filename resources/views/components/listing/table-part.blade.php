@php
    $item= $model->items()[0];
@endphp
<div class="table-responsive">
    <table class="table bg-white table-hover table-bordered rounded small">
        <thead>
        <tr class="bg-light text-secondary text-uppercase">
            <th class="p-2" scope="col" style="width: 2rem">
                <i class="fa-solid fa-square-check"></i>
            </th>
            @foreach(array_keys($item->getAttributes()) as $header)
                @if(!in_array($header, array_keys($listing)) || !$listing[$header]['isVisible'] )
                    @continue
                @endif
                <th class="p-2" scope="col">
                    <small class="me-2">{{ $header }}</small>
                </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="bg-light p-2">
                <input type="checkbox">
            </th>
            <th class="p-2">1</th>
            <td class="p-2">Mark</td>
            <td class="p-2">Otto</td>
            <td class="p-2">@mdo</td>
        </tr>
        <tr>
            <th scope="row" class="bg-light p-2">
                <input type="checkbox">
            </th>
            <th scope="row" class="p-2">1</th>
            <td class="p-2">Mark</td>
            <td class="p-2">
                <li>asbas</li>
                <li>bffb</li>
            </td>
            <td class="p-2">@mdo</td>
        </tr>
        <tr>
            <th scope="row" class="bg-light p-2">
                <input type="checkbox">
            </th>
            <th scope="row" class="p-2">1</th>
            <td class="p-2">Mark</td>
            <td class="p-2">Otto</td>
            <td class="p-2">@mdo</td>
        </tr>
        </tbody>
    </table>
</div>
