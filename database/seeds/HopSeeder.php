<?php

use App\Models\Hop;
use Illuminate\Database\Seeder;

class HopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hop::class, 25)->create();
    }
}
