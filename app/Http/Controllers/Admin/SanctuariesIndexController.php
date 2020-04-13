<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Models\Sanctuary;

class SanctuariesIndexController
{
    public function __invoke()
    {
        $sanctuaries = Sanctuary::query();

        return view('admin.sanctuaries.index')->with([
            'sanctuaries' => $sanctuaries->paginate(50)
        ]);
    }
}
