<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;

class CentreShowController extends Controller
{
    public function __invoke(Request $request, Centre $centre)
    {
        return view('centres.show', [
            'centre' => $centre,
        ]);
    }
}
