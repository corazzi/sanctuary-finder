<ul>
    @foreach ($centre->social_media as $platform => $link)
        @if ($link === null)
            @continue
        @endif

        <li class="mb-2">
            <a class="flex" href="{{ $link }}" target="_blank">
                @switch($platform)
                    @case('facebook')
                    <x-fab-facebook class="w-6 h-6"/>
                    @break
                    @case('twitter')
                    <x-fab-twitter class="w-6 h-6"/>
                    @break
                    @case('instagram')
                    <x-fab-instagram class="w-6 h-6"/>
                    @break
                @endswitch

                <span class="pl-4">{{ ucfirst($platform) }}</span>
            </a>
        </li>
    @endforeach
</ul>
