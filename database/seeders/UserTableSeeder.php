<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'role_id' => '1',
            'email' => 'rtasnia007@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Admin'

        ]);

        

        User::create([
            'id' => '2',
            'role_id' => '2',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Customer'
        ]);
    
        User::factory(5)->create();
    }
}
