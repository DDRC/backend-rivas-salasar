<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // use HasFactory;
    protected $table='players';
    protected $fillable=[
        'id',
        'name',
        'nickName',
        'status',
        'gameslist',
        'stadistics',
    ];
    // relaciones 
    // uno a uno
    // function game(){
    //     return $this->hasOne(Game::class);
    // }
    // uno a varios
    // function games(){
    //     return $this->hasMany(Game::class);
    // }
    // varios a varios
    function games(){
        return $this->belongsToMany(Game::class)->withTimestamps();
    }
}
