<p>
    @foreach ($centre->locations as $location)
        <span class="block mb-4">
            {{ $location->opening_times_info }}
        </span>
    @endforeach
</p>
