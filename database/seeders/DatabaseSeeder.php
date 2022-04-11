<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('tittle')->insert([
            'tittle' => 'first_tittle',
            'ticket' => 'you can do everything just try.',
            'answer' => 'yes that is right.',
            'ynAnswer' => true,
            'user_name' =>'user1',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'admin' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'admin' => false,
        ]);
    }
}
