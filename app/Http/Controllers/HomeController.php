<?php

namespace App\Http\Controllers;

use App\Domain\Models\Sanctuary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest = Sanctuary::orderBy('created_at', 'desc')->take(6)->get();

        return view('home')->with([
            'sanctuaries' => $latest
        ]);
    }
}
