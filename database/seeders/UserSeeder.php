<?php

namespace Database\Seeders;

use App\Models\User;
use illmuniate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        User::create([
            'name' => 'kamto',
            'email' => 'kamto@gmail.com',
            'password' => Hash::make('kamtokeren'),    
        ]);
    }
}
