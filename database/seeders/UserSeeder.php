<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Bruno',
            'email' => 'bruno@teste.com',
            'password' => bcrypt('abc123'),
            'phone' => '44988447123'
        ]);
    }
}
