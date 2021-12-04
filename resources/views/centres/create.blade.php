<x-app-layout>
    <x-slot name="adminHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Centre') }}
        </h2>
    </x-slot>

    <div class="py-12 px-8  flex w-full justify-center">
        <form action="/centres" method="post">
            @csrf

            <h2 class="text-3xl my-4">Details</h2>
            <div>
                <input type="text" id="name" name="name" placeholder="Centre name"/>
            </div>

            <div class="mt-4">
                <textarea name="description" id="description" class="block w-full"></textarea>
            </div>

            <div class="mt-4">
                <div>
                    <input type="text" name="social_media[facebook]" id="facebook" placeholder="Facebook"/>
                </div>
                <div>
                    <input type="text" name="social_media[twitter]" id="twitter" placeholder="Twitter"/>
                </div>
                <div>
                    <input type="text" name="social_media[instagram]" id="instagram" placeholder="Instagram"/>
                </div>
            </div>

            <div class="mt-4">
                <input type="text" placeholder="website" name="web_address"/>
            </div>

            <div class="mt-4">
                <label for="volunteering" class="block">Volunteering</label>
                <textarea name="volunteering_info" id="volunteering"></textarea>
            </div>

            <div class="mt-4">
                <label for="donation" class="block">Donations</label>
                <textarea name="financial_support_info" id="donation"></textarea>
            </div>

            <div class="mt-4">
                <select name="type" id="type">
                    <option value="rescue">Rescue</option>
                    <option value="sanctuary">Sanctuary</option>
                </select>
            </div>

            <h2 class="text-3xl my-4">Location</h2>

            <div class="mt-4">
                <label for="address_line_1" class="block">
                    Address Line 1
                </label>
                <input type="text" name="location[address_line_1]" id="address_line_1"/>
            </div>

            <div class="mt-4">
                <label for="address_line_2" class="block">
                    Address Line 2
                </label>
                <input type="text" name="location[address_line_2]" id="address_line_2"/>
            </div>

            <div class="mt-4">
                <label for="postcode" class="block">Postcode</label>
                <input type="text" name="location[postcode]" id="postcode"/>
            </div>

            <div class="mt-4">
                <label for="town" class="block">Town</label>
                <input type="text" name="location[town]" id="town"/>
            </div>

            <div class="mt-4">
                <label for="telephone" class="block">Telephone</label>
                <input type="text" name="location[telephone]" id="telephone"/>
            </div>

            <div class="mt-4">
                <label for="opening_times_info" class="block">Opening Times Info</label>
                <textarea name="location[opening_times_info]" id="opening_times_info"></textarea>
            </div>

            <div class="mt-4">
                <input type="submit" value="Submit" class="bg-green-700 text-white p-4 w-full"/>
            </div>
        </form>
    </div>
</x-app-layout>
