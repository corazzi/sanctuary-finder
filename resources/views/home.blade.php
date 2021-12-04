<x-app-layout>
    <x-slot name="adminHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 flex justify-center">
        <x-search-form></x-search-form>
    </div>

    <div class="pt-12 bg-green-700 h-full text-white pb-96 px-8">
        <header class="mb-8">
            <img src="img/logo-inverse.png" class="m-auto"/>
        </header>

        <div class="max-w-3xl m-auto text-xl">
            <h2 class="mb-8">
                <strong>Sanctuary Finder</strong> is a directory of animal sanctuaries and
                animal rescues in the United Kingdom.
            </h2>

            <p class="mb-4">
                Browse our ever-growing list or search a location near you to find... [what?]
            </p>

            <p class="mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aperiam debitis delectus, earum eius eos id libero molestias nemo neque quas
                repudiandae sequi similique. Eos nobis perferendis quibusdam, quo voluptates voluptatum!
            </p>

            <p class="mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias assumenda commodi
                dolor enim est facilis in, ipsam, iusto magni minus nisi perferendis quas recusandae voluptatem!
                Excepturi exercitationem fugiat numquam.
            </p>

            <div class="flex flex-col md:flex-row justify-between mt-16 text-base md:text-lg">
                <div class="w-full md:w-1/2">
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 md:mb-2">Sanctuaries</h3>
                    <p class="mb-4 pr-8">
                        <strong>An animal sanctuary</strong> is lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Adipisci alias assumenda commodi
                        dolor enim est facilis in, ipsam, iusto magni minus nisi perferendis quas recusandae voluptatem!
                        Excepturi exercitationem fugiat numquam.
                    </p>
                </div>

                <div class="w-full md:w-1/2">
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 md:mb-2">Rescues</h3>
                    <p class="mb-4 pr-8">
                        <strong>An animal rescue</strong> is lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Aperiam debitis delectus, earum eius eos id libero molestias nemo neque quas
                        repudiandae sequi similique. Eos nobis perferendis quibusdam, quo voluptates voluptatum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
