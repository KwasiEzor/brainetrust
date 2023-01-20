<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Post::factory()
        ->has(Comment::factory(rand(1,3)),[
            'user_id'=> User::factory()
        ])
        ->create([
            'category_id'=>Category::factory(),
            'user_id'=>User::factory()
        ])->each(function($post){
            $tags = Tag::pluck('id');
            $post->tags()->attach($tags);
        });
    }
}
