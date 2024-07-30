<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = User::create([
            'name' => 'Admin2',
            'email' => 'admin@pei.com',
            'username' => 'admin2',
            'password' => bcrypt('password'),
        ]);

    }
}
