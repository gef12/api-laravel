<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
    protected $table = 'cds';
    protected $fillable = ['name'];
    
    public function artistas(){
        return $this->hasMany(Artista::class);
    }
    public function generos(){
        return $this->hasMany(Genero::class);
    }
}
