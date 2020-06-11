<?php

use App\User;
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
        $user = User::create([
            'name' => 'Abdallah',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456789')
        ]);

        $user->assignRole('admin');
    }
}
