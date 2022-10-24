<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialization1 = new Specialization();
        $specialization1->name = 'General';
        $specialization1->save();

        $specialization2 = new Specialization();
        $specialization2->name = 'Preventative';
        $specialization2->save();

        $specialization3 = new Specialization();
        $specialization3->name = 'Cosmetic';
        $specialization3->save();

        $specialization4 = new Specialization();
        $specialization4->name = 'Emergency';
        $specialization4->save();
    }
}
