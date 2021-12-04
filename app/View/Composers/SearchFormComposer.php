<?php

namespace App\View\Composers;

use Illuminate\View\View;

class SearchFormComposer
{
    public function compose(View $view)
    {
        $view->with('distances', [
            '' => 'Any distance',
            5 => '5km / 8mi',
            10 => '10km / 16mi',
            15 => '15km / 24mi',
            20 => '20km / 32mi',
            30 => '30km / 48mi',
            50 => '50km / 80mi',
            100 => '100km / 160mi',
            250 => '250km / 400mi',
            500 => '500km / 800mi',
        ]);
    }
}
