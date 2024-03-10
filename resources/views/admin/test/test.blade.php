@extends('admin.navbar')

@section('main')
    <x-listing.listing-view :data="$data" :flags="$flags">
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
    </x-listing.listing-view>
@endsection
