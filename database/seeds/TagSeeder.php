<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Carne', 'Pesce', 'Vegano', 'Vegetariano', 'Senza glutine', 'Senza lattosio'];
        
        foreach($tags as $name){
            $taf = Tag::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        } 
    }
}
