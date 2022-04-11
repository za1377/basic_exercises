<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
