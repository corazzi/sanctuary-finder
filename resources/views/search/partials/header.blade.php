<header class="search-header md:py-20 mb-16">
    <div class="md:w-1/2 m-auto">
        <div>
            <h1 class="text-4xl mb-4 md:w-4/5">
                <span class="font-bold">Find local sanctuaries</span>
                for donations, rescues, or volunteering.
            </h1>
        </div>

        <section>
            <form action="{{ url('/search') }}" method="get" class="search flex flex-col h-full w-full">
                <input type="hidden" name="radius" value="50"/>

                <div class="flex flex-col md:flex-row w-full mb-4 relative">
                    <input
                        type="text"
                        name="q"
                        class="px-4 py-3 w-full text-gray-800"
                        placeholder="Search for a city, town, or postcode"
                        autocomplete="off"
                        value="{{ request('q') }}"
                    />
                    <button type="submit" class="submit"></button>
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
