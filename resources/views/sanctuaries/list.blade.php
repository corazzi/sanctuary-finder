@php
    use Illuminate\Pagination\LengthAwarePaginator;
@endphp

<sanctuary-listings
    title="{{ $title }}"
    :initial-sanctuaries="{{ $sanctuaries->toJson() }}"
></sanctuary-listings>

@if (get_class($sanctuaries) === LengthAwarePaginator::class)
    <div class="mt-4">
        {{ $sanctuaries->appends(request()->all())->links() }}
    </div>
@endif
