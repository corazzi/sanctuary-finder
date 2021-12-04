<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Location;
use App\Models\Postcode;
use Illuminate\Http\Request;

class CentreCreateController
{
    public function __invoke(Request $request)
    {
        return view('centres.create');
    }

    public function create(Request $request)
    {
        $centre = Centre::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'web_address' => $request->get('web_address'),
            'volunteering_info' => $request->get('volunteering_info'),
            'financial_support_info' => $request->get('financial_support_info'),
            'type' => $request->get('type'),
            'social_media' => $request->get('social_media'),
        ]);

        $postcode = Postcode::where('postcode', $request->get('location')['postcode'])->firstOrFail();

        $location = Location::create(
            array_merge([
                'centre_id' => $centre->id,
                'latitude' => $postcode['latitude'],
                'longitude' => $postcode['longitude'],
            ], $request->get('location'))
        );

        return redirect()->back();
    }
}
