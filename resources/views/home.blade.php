@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
             role="alert">
            {{ session('status') }}
        </div>
    @endif

    <header class="search-header md:py-20 mb-16">
        <div class="md:w-1/2 m-auto">
            <div>
                <h1 class="text-4xl mb-4 md:w-4/5">
                    <span class="font-bold">Find local sanctuaries</span>
                    for donations, rescues, or volunteering.
                </h1>
            </div>

            <section>
                <form action="/search" class="search" method="get" class="flex flex-col h-full w-full">
                    <input type="hidden" name="radius" value="50" />

                    <div class="flex flex-col md:flex-row w-full mb-4 relative">
                        <input
                            type="text"
                            name="q"
                            class="px-4 py-3 w-full text-gray-800"
                            placeholder="Search for a city, town, or postcode"
                            autocomplete="off"
                        />
                        <button type="submit" class="submit"></button>
                    </div>

                    <div class="flex flex-col hidden">
                        <h4 class="font-bold mb-4">Filter by distance</h4>
                        <div class="flex justify-between md:justify-start">
                            @include('search.partials.filters.postcode')
                        </div>
                    </div>

                    <div class="filters flex hidden">
                        <div class="flex flex-col w-1/2 md:w-1/3">
                            <h4 class="font-medium mb-4">Filter by species</h4>
                            @include('search.partials.filters.species')
                        </div>
                    </div>

                    <div class="hidden">
                        <button class="button mt-4 w-full p-4 text-2xl font-medium">
                            Search
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </header>

    <section class="container">
        <h3 class="font-bold text-2xl ml-3 mb-5">Latest Sanctuaries</h3>

        <div class="flex flex-wrap justify-start">
            @foreach ($sanctuaries as $sanctuary)
                <sanctuary-card
                    :data="{{ $sanctuary }}"
                ></sanctuary-card>
            @endforeach
        </div>
    </section>
@endsection
