<?php

namespace Database\Seeders;

use App\Models\Government;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $govenments = [['الشرقيه', 'El-Sharkia'], ['الدقهدليه', 'El-Dakahlia']];
        foreach ($govenments as $govenment) {
            Government::create([
                'name_ar' => $govenment[0],
                'name_en' => $govenment[1],
            ]);
        }
    }
}
