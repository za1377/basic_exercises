<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TittleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tittle')->insert([
            'tittle' => 'first_tittle',
            'ticket' => 'you can do everything just try.',
            'answer' => 'yes that is right.',
            'y/nAnswer' => true,
            'user_name' =>'user1',
        ]);
    }
}
