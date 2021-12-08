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
        App\User::create([
            'name' => 'OMAR FARUK',
            'email' => 'faruk@cslsoft.com',
            'password'=> bcrypt('sa'),
            'for_client' => 1,
            'is_active' => 1
        ]);
        App\User::create([
            'name' => 'Administrator',
            'email' => 'admin@cslsoft.com',
            'password'=> bcrypt('sa'),
            'for_client' => 0,
            'is_active' => 1
        ]);
    }
}
