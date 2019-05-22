<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = ['name'];
    public function cds(){
        return $this->belongsToMany(Cd::class);
    }
}
