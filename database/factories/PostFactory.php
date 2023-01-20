<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

            'title'=>$this->faker->sentence(),
            'subtitle'=>$this->faker->sentence(),
            'excerpt'=>$this->faker->sentence(),
            'content'=>$this->faker->paragraphs(rand(3,5),true),
            'cover_img'=>'http://unsplash.it/640/480',
            'category_id'=>Category::inRandomOrder()->first()->id,
           // 'user_id'=>User::inRandomOrder()->first()->id,
            'is_published'=>$this->faker->boolean(50),
            'is_highlighted'=>$this->faker->boolean(15),
            'views'=>$this->faker->numberBetween(0,500),
            'source'=>$this->faker->url()


        ];
    }
}
