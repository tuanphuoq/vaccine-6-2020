<?php

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
       DB::table('users')->insert([
            'fullname' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'address' => '',
            'phone' => '0987654321',
            'role' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
