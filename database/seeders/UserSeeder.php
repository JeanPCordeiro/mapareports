<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'name' => 'Damien CORDEIRO',
            'email' => 'damien.cordeiromarques@gmail.com',
            'password' => Hash::make('DamThom9700'),
            'admin' => true,
        ]);        
        DB::table('users')->insert([
            'name' => 'Jean Pierre CORDEIRO',
            'email' => 'jeanpierre.cordeiro@gmail.com',
            'password' => Hash::make('DamThom9700'),
            'admin' => true,
        ]);        
    }
}
