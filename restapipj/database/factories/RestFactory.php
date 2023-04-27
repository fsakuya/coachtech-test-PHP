<?php

namespace Database\Factories;

use App\Models\Rest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class RestFactory extends Factory
{
        /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Rest::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' =>  Str::random(10),
            'url' => $this->faker->url,  
        ];
    }
}
