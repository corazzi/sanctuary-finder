<div>
    @if ($location->hide_address)
        <p>This location has opted to hide their address from the public.</p>
        <p>This may be for privacy and safety reasons.</p>
        <p>Contact the centre directly for more information.</p>
    @else
        <span class="block">{{ $location->address_line_1 }}</span>
        <span class="block">{{ $location->address_line_2 }}</span>
        <span class="block">{{ $location->town }}</span>
        <span class="block">{{ $location->postcode }}</span>
        <span class="block mt-1">{{ $location->telephone }}</span>
        <a
            class="block mt-2 text-green-700 text-sm"
            href="{{ $location->google_maps_link }}"
            target="_blank"
        >
            View on Google Maps
        </a>
    @endif
</div>
