@extends('layouts.app')

@section('content')
    @include('search.partials.header')

    @include('sanctuaries.list', [
        'title' => 'Results',
        'sanctuaries' => $sanctuaries
    ])
@endsection
