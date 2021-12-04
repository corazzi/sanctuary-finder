<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;

class CentreListingController extends Controller
{
    public function __invoke(Request $request)
    {
        $centres = Centre::query()
            ->with('locations')
            ->when($request->get('location'),
                fn ($builder) => $builder->nearLocation($request->get('location'), $request->get('radius')));

        return view('centres.index', [
            'centres' => $centres
                ->paginate(15)
                ->withQueryString(),
        ]);
    }
}
