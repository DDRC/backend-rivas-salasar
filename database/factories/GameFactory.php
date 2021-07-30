<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prize'=>$this->faker->randomFloat(2,0,100),
            'state'=>$this->faker->lexify('??????????'),
            'owner'=>$this->faker->lexify('??????????'),
            'title'=>$this->faker->lexify('????? ????? ????????'),
            'developer'=>$this->faker->bothify('??##??##???##?????'),
            'genre'=>$this->faker->lexify('??????????'),
            'releaseDate'=>$this->faker->date('Y-m-d','now'),
            'sold'=>$this->faker->randomElement(['true','false']),
        ];
    }
}
