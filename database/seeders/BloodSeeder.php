<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloods=['A+','O+','B+','AB+','O-','A-','AB-','B-',];
        foreach ($bloods as $blood)
        {
        Blood::create([
            'name' => $blood,
        ]);
    }
    }
}
