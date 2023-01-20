<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(PostSeeder::class);

//        $posts = Post::factory(rand(1,5))
//            ->hasAttached(Tag::factory())
//            ->create([
//                'user_id'=>User::factory()
//            ]);

//        User::factory(10)
//            ->has(Post::factory(rand(1,5))
//                ->hasComments(rand(1,3)))
//            ->create();


          $categories = Category::factory(5)->create();

          User::factory(20)->create()->each(function($user) use($categories){
              $tags = Tag::factory(10)->create();
              foreach ($categories as $category) {
                  Post::factory(rand(1,3))
                      ->hasComments(rand(1,3))
                      ->create([
                    'category_id'=>$category->id,
                      'user_id'=>$user->id
                  ])->each(function($post) use($tags){
                      $post->tags()->attach($tags);
                      $post->likes()->create([
                          'user_id'=>User::inRandomOrder()->first()->id
                      ]);
                  });
              }

          });

    }
}
