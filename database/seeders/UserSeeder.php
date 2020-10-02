<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => Str::'Damien CORDEIRO',
            'email' => Str::'damien.cordeiromarques@gmail.com',
            'password' => Hash::make('DamThom9700'),
        ]);        
        DB::table('users')->insert([
            'name' => Str::'Jean Pierre CORDEIRO',
            'email' => Str::'jeanpierre.cordeiro@gmail.com',
            'password' => Hash::make('DamThom9700'),
        ]);        
    }
}
