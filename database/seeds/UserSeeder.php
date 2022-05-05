<?php

use App\User;
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
        //creazione admin user per evitare registrazione ogni volta
        User::create([
            'name' => 'Alb',
            'email' => 'alb@tipo.com',
            'password' => Hash::make('pizza123'),
        ]);
    }
}
