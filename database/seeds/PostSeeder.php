<?php

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // uso il pluck() per ottenere solo i valori dell'array di $category_id
        $category_ids = Category::pluck('id')->toArray();

        for ($i=0; $i<10; $i++) {
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text(10);
            $post->content = $faker->paragraph(3);
            $post->image = $faker->imageUrl(250, 250);
            $post->slug = Str::slug( $post->title, '-');
            $post->save();
        }
    }
}
