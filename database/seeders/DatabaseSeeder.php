<?php

namespace Database\Seeders;

use App\Models\Centre;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('postcodes:update');

        User::factory()->create([
            'name' => 'Sanctuary Finder',
            'email' => 'admin@sanctuaryfinder.com',
        ]);

        Centre::factory()
            ->count(100)
            ->has(
                Location::factory()
                    ->count(1)
            )
            ->create();
    }
}
