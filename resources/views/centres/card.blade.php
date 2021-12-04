<article class="w-1/2 md:w-1/4 sanctuary-card p-1 md:p-4">
    <a href="{{ route('centres.show', ['centre' => $centre, 'slug' => $centre->slug]) }}">
        <div class="rounded overflow-hidden shadow-md">
            <div class="relative h-32 md:h-64 overflow-hidden">
                <img class="w-full h-full object-cover"
                     src="https://images.unsplash.com/photo-1511044568932-338cba0ad803?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2670&q=80"
                     alt="An orange cat">
            </div>
            <div class="p-2 md:px-6 md:py-4">
                <div class="font-semibold md:font-bold text-sm md:text-xl md:mb-2 relative">
                    <div class="md:w-5/6">
                        <span class="hidden md:block">
                            {{ Illuminate\Support\Str::limit($centre->name, 30) }}
                        </span>

                        <span class="block md:hidden">
                            {{ Illuminate\Support\Str::limit($centre->name, 18) }}
                        </span>
                    </div>

                    @if ($centre->is_vegan && config('sanctuary-finder.show_vegan_information'))
                        <div
                            class="bg-green-700 rounded-full text-white font-bold w-8 h-8 absolute flex items-center justify-center right-0 top-0">
                            <x-icon name="vegan" class="w-5 h-5 text-white fill-current"></x-icon>
                        </div>
                    @endif
                </div>
                <div class="text-xs md:text-base mb-1 md:mb-2 flex items-center">
                    <x-heroicon-o-location-marker
                        class="md:-ml-1 w-3 h-3 md:w-6 md:h-6 text-gray-400"></x-heroicon-o-location-marker>
                    <span class="ml-1 md:ml-2 text-gray-600">{{ $centre->towns }}</span>
                </div>
            </div>
        </div>
    </a>
</article>
