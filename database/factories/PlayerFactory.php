<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->lexify('??????? ???????'),
            'nickname'=>$this->faker->lexify('??????????????'),
            'status'=>$this->faker->lexify('?????'),
            'gameslist'=>implode(',',$this->faker->randomElements(['WoW', 'Witcher 3', 'Horizon Zero Dawn', 'Lol', 'Valorant'],3)),
            'stadistics'=>$this->faker->paragraph(),
        ];
    }
}

