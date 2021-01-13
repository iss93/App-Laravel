<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* User::create([
            'name' => 'Igor Silva',
            'email' => 'santanasilvaigor@hotmail.com',
            'password' => bcrypt('123456'), 
        ]); */
        User::factory(10)->create();
    }
}
