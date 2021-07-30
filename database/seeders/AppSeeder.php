<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPlayerGames();
    }
    function createPlayerGames(){
        Player::factory(10)
        ->hasGames(3,
        [
            'state'=>'actualizado',
            //  'releaseDate'=>null,
        ])
        ->create([
            'nickname'=>'abd',
            
        ]);
    }
}
