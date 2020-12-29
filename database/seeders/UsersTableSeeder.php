<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create(
            [
                'name' => 'Rafael Souto',
                'email' => 'souto.rafaelb@gmail.com',
                'password' => bcrypt(123456),
            ]
        );
    }
}
