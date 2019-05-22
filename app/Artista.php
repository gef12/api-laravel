<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $fillable = ['name'];

    public function cds(){
        return $this->belongsToMany(Cd::class);
    }
}
