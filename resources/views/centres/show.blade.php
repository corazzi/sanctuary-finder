<x-app-layout>
    <x-slot name="adminHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Viewing {$centre->type}") }} – {{ $centre->name }}
        </h2>
    </x-slot>

    <div class="h-48 md:h-96 overflow-hidden">
        <img class="w-full h-full object-cover"
             src="https://images.unsplash.com/photo-1511044568932-338cba0ad803?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2670&q=80"
             alt="An orange cat">
    </div>

    <div class="border-b border-b-gray-900 h-12">
        <div class="flex justify-between items-center max-w-7xl h-full m-auto">
            <div class="flex px-5">
                <x-heroicon-o-location-marker class="w-6 h-6 text-gray-500"></x-heroicon-o-location-marker>
                <span class="text-gray-700 ml-2">{{ $centre->towns }}</span>
            </div>

            @if (config('sanctuary-finder.show_vegan_information'))
                <div class="flex">
                    @if ($centre->is_vegan)
                        <x-icon name="vegan" class="w-6 h-6 text-green-700 fill-current"></x-icon>
                        <span class="text-gray-700 ml-2">Confirmed vegan-run sanctuary</span>
                    @else
                        <x-icon name="vegan" class="w-6 h-6 text-red-500 fill-current"></x-icon>
                        <span class="text-gray-700 ml-2">Not a vegan-run sanctuary</span>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <div class="max-w-7xl m-auto mt-8 pl-4">
        <a
            href="{{ url()->previous('browse') }}"
            class="inline-flex items-center border border-green-700 text-green-700 hover:bg-green-700 hover:text-white rounded-md px-2 py-1 text-sm"
        >
            <x-fas-arrow-left class="w-4 h-4"></x-fas-arrow-left>
            <span class="ml-2">Back to sanctuaries &amp; rescues</span>
        </a>
    </div>

    <div class="flex flex-col md:flex-row justify-center mt-8">
        <div class="pl-4 md:pl-0 pr-4 py-4 w-full md:w-1/3">
            <h1 class="text-4xl font-bold mb-4">{{ $centre->name }}</h1>

            @if ($centre->web_address)
                <a
                    href="{{ $centre->web_address }}" target="_blank"
                    class="inline-flex items-center border border-green-700 text-white bg-green-700 hover:bg-white hover:text-green-700 rounded-md px-2 py-1 text-sm mb-8"
                >
                    <x-fas-external-link-alt class="w-4 h-4"></x-fas-external-link-alt>
                    <span class="ml-2">Visit website</span>
                </a>
            @endif

            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b border-b-gray-50">Location</h3>
                @each('centres.location', $centre->locations, 'location')
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b border-b-gray-50">Opening Times</h3>
                @include('centres.opening-times', $centre)
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b border-b-gray-50">Social Media</h3>
                @include('centres.social', $centre)
            </div>

            <div class="mb-8">
                <p>Incorrect or missing information?</p>
                <a class="text-green-700" href="#">Please let us know.</a>
            </div>
        </div>

        <div class="p-4 w-full md:w-2/3 prose">
            <h2 class="flex pb-4">
                <x-heroicon-o-information-circle class="w-6 h-6 mt-1 mr-2"></x-heroicon-o-information-circle>
                About
            </h2>
            <p>{{ $centre->description }}</p>

            <h2 class="flex pb-4">
                <x-heroicon-o-cash class="w-6 h-6 mt-1 mr-2"></x-heroicon-o-cash>
                Donations &amp; Financial Support
            </h2>
            <p>
                @if ($centre->financial_support_info)
                    {{ $centre->financial_support_info }}
                @else
                    <em>This centre hasn't provided any financial support information.</em>
                @endif
            </p>

            <h2 class="flex pb-4">
                <x-heroicon-o-support class="w-6 h-6 mt-1 mr-2"></x-heroicon-o-support>
                Volunteering
            </h2>
            <p>
                @if ($centre->volunteering_info)
                    {{ $centre->volunteering_info }}
                @else
                    <em>This centre hasn't provided any volunteering information.</em>
                @endif
            </p>

            <h2 class="flex text-green-700">
                <x-heroicon-o-shield-check class="w-6 h-6 text-green-700 mt-1 mr-2"/>
                No-kill {{ $centre->type }}
            </h2>

            <p>
                <strong class="block mb-2">All of the sanctuaries and rescues listed on this site are no-kill
                    centres.</strong>
                This means that a healthy or treatable animal in their care will never be put to sleep.
                Euthanasia is reserved only for the terminally ill residents.
            </p>

            @if (config('sanctuary-finder.show_vegan_information'))
                <h2 class="flex">
                    <x-icon name="vegan" class="w-6 h-6 text-green-700 fill-current"></x-icon>
                    <span class="-ml-1 text-green-700">egan-run charity</span>
                </h2>
                <p>
                    The owners have informed us that this is a vegan sanctuary, meaning it is run or owned by vegans and
                    operates a no-kill policy.
                </p>
                <a
                    href="#"
                    class="text-sm text-green-700 no-underline"
                >
                    Read more about how we determine what makes a "vegan" sanctuary
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
