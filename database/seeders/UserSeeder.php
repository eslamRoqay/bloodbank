<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'city_id' => 1,
            'government_id' => 1,
            'blood_id' => 1,
            'name' => 'user',
            'email' => 'user@user.com',
            'phone' => '010000000000',
            'fcm_token' => '000000000000',
            'date_of_birth' => Carbon::today(),
            'password' => '123456',
        ]);
    }
}
