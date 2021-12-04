<form class="w-full max-w-lg" action="{{ url('browse') }}">
    <div class="flex flex-wrap items-center mb-6">
        <div class="w-full p-3">
            <label class="block tracking-wide text-gray-700 text-base font-bold mb-2"
                   for="location">
                Postcode
            </label>
            <input
                class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="location"
                name="location"
                type="text"
                placeholder="Postcode"
                autocomplete="off"
                value="{{ strtoupper(request()->get('location')) }}"
                data-location
            >
        </div>
        <div class="w-full px-3 text-sm hidden">
            <a
                data-use-current-location
                class="text-green-700 cursor-pointer block text-right"
            >
                Use current location
            </a>

            <input type="hidden" name="latitude" data-latitude>
            <input type="hidden" name="longitude" data-longitude>
        </div>
        <div class="w-full p-3 flex items-center">
            <label class="tracking-wide text-gray-700 text-base font-bold mb-2 mt-2"
                   for="radius">
                within
            </label>
            <select
                name="radius"
                id="radius"
                class="text-gray-700 border border-gray-200 rounded py-3 px-4 ml-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-2/3 md:w-1/3"
            >
                @foreach ($distances as $value => $label)
                    <option
                        value="{{ $value }}"
                        @if(request()->get('radius') == $value)
                        selected
                        @endif
                    >
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        @if (config('sanctuary-finder.show_vegan_information'))
            <div class="w-full p-3 flex items-center">
                <input
                    class="appearance-none border-1 rounded-sm mr-4 text-green-700 rounded-full w-6 h-6"
                    type="checkbox"
                    value="true"
                    name="vegan"
                    id="vegan"
                    @if(request()->get('vegan') === 'true')
                    checked
                    @endif
                />
                <label
                    class="tracking-wide text-gray-700 text-base font-bold mb-2 mt-2 flex items-center cursor-pointer"
                    for="vegan">
                    <x-icon name="vegan" class="w-6 h-6 text-green-700 fill-current"></x-icon>
                    <span class="mt-1 ml-2">only vegan sanctuaries</span>
                </label>
            </div>
        @endif

        <div class="w-full p-3 flex flex-col md:flex-row justify-between">
            <button
                class="w-1/3 flex-shrink-0 bg-green-700 hover:bg-green-700 border-green-700 hover:border-green-700 text-base border-4 text-white py-1 px-2 rounded"
                type="submit"
                data-submit
            >
                Search
            </button>
            <a
                href="{{ url('browse') }}"
                class="inline text-base py-2 md:px-4 mt-2 md:mt-0 text-green-700"
            >
                or Browse All Sanctuaries & Rescues
            </a>
        </div>
    </div>
</form>
