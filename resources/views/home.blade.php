@extends('layouts.app')

@section('content')
    @include('search.partials.header')

    @include('sanctuaries.list', [
        'title' => 'Latest Sanctuaries',
        'sanctuaries' => $sanctuaries
    ])
@endsection
