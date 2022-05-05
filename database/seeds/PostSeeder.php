<?php

use App\Post;
use App\Category;
use App\Tag;
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

        //recuperare i tags
        $tags = Tag::all();

        $tagsId = $tags->pluck('id')->all();

        for ($i = 0; $i < 100; $i++){

            $post = new Post();
            $post->title = $faker -> words(7, true);
            $post->slug = Str::slug( $post->title );
            $post->content = $faker->paragraph(10, true);
            $post->published_at = $faker->optional()->dateTime(); //$faker->randomElement([ null, $faker->dateTime() ])

            //passare l'array di id
            $post->category_id = $faker->optional()->randomElement($categoriesId);

            //recuperare 2 tags casuali -> attaccarli al post
            $randomTags = $faker->randomElements($tagsId, 2);

            $post->save();

            //da inserire dopo il save del post
            $post->tags()->attach($randomTags);
        }
    }
}
