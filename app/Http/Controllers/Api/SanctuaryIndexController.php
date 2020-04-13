<?php

namespace App\Http\Controllers\Api;

use App\Domain\Models\Sanctuary;
use App\Domain\Services\PostcodeLookup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SanctuaryIndexController
{
    public function __invoke(Request $request)
    {
        $location = PostcodeLookup::make($request->get('q'));

        $results = Sanctuary::nearPostcode($location, $request->get('radius'));

        if ($request->input('vegan') == 'true') {
            $results->vegan();
        }

        return $results->paginate(30);
    }
}
