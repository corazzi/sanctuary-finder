<?php

use App\Domain\Models\Sanctuary;
use Illuminate\Database\Seeder;

class SanctuarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sanctuary::class, 20)->create();
    }
}
