@extends('admin.navbar')

@section('main')
    <x-listing.listing-view :data="$data" :flags="$flags"/>
@endsection
