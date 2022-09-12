<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loc1 = new Location();
        $loc1->name = 'Doncaster';
        $loc1->save();

        $loc2 = new Location();
        $loc2->name = 'Melbourne';
        $loc2->save();
    }
}
