<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            //creare tag
            TagSeeder::class,
            //creare categorie
            CategorySeeder::class,
            PostSeeder::class
        ]);
    }
}
