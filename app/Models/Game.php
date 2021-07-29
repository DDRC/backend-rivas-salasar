<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // use HasFactory;
    //nombre de la tabla
    protected $table='games';
    // compos de la tabla
    protected $fillable=[
        'prize',
        'state',
        'owner',
        'developer',
        'genre',
        'releaseDate',
        'sold',
    ];
    protected $attributes=['full_name'];
    //castear para que se acople a un tipo de representacion de un campo
    protected $casts=[
        'releaseDate'=>'DateTime:Y-m-d',
        'sold'=>'boolean',
    ];
//mutadores-->funciones que cambian la estructura de los datos y los datos en si
function setPrizeAtribute($value){
    $this->attributes['prize']='$ '.$value;
}
//accessors --> obtiene informacin de la DB cambiando solo la respuesta pero no lo de la DB
function getPrizeAtribute($value){
    return $this->attributes['developer'].strtolower($this->attributes['developer']);
}
function getFullNameAtribute($value){
    return $this->attributes['owner'].$this->attributes['state'];
}
    // relaciones 
    // uno a uno

    // function player(){
    //     return $this->belongsTo(Player::class);
    // }

    // uno a varios
    function player(){
        return $this->belongsTo(Player::class);
    }
    // varios a varios
    // function players(){
    //     return $this->belongsToMany(Player::class)->withTimestamps();
    // }
}
