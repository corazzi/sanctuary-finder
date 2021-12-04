<x-app-layout>
    <x-slot name="adminHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Browse Sanctuaries &amp; Rescues') !!}
        </h2>
    </x-slot>

    <div class="md:pb-12 px-8  flex justify-center">
        <x-search-form></x-search-form>
    </div>

    <x-centres-list :centres="$centres"></x-centres-list>

    <x-pagination :collection="$centres"></x-pagination>
</x-app-layout>
