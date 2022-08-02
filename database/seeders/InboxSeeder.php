<?php

namespace Database\Seeders;

use App\Models\Inbox;
use Illuminate\Database\Seeder;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inbox = Inbox::create([
            'user_id' => '1',
            'header' => 'subject subject',
            'content' => 'message message message message',
        ]);
    }
}
