<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualidade extends Model
{
    protected $fillable = [
        'name'
    ];
    public function fornecedores(){
        return $this->belongsToMany(Fornecedor::class);
    }
}
