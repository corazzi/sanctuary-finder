<?php

namespace App\Http\Controllers;

use App\Domain\Models\Sanctuary;
use App\Domain\Services\PostcodeLookup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController
{
    public function index(Request $request)
    {
        $location = PostcodeLookup::make($request->get('q'));
        $results = Sanctuary::nearPostcode($location, $request->get('radius'));

        return view('search')->with([
            'sanctuaries' => $results->paginate(30)
        ]);
    }
}
