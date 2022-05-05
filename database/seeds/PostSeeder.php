<?php

use App\Post;
use App\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //recuperare le categorie
        $categories = Category::all();

        //inserire gli id delle categorie in un array
        $categoriesId = $categories->pluck('id')->all();

        for ($i = 0; $i < 100; $i++){

            $post = new Post();
            $post->title = $faker -> words(7, true);
            $post->slug = Str::slug( $post->title );
            $post->content = $faker->paragraph(10, true);
            $post->published_at = $faker->optional()->dateTime(); //$faker->randomElement([ null, $faker->dateTime() ])

            //passare l'array di id
            $post->category_id = $faker->optional()->randomElement($categoriesId);

            $post->save();
        }
    }
}
