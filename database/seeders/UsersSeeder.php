<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        user::create([
            'name' => 'Tjeerd',
            'role_id' => '1',
            'email' => 'tjeerd@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
