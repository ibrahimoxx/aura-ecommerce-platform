<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commandes;
use App\Models\Products;

class Centenir extends Model
{
    protected $table = 'centenir';
    protected $fillable = [
        'codeProd',
        'codeCom',
        'qtePro',
        'prixtotal',
    ];


    
    public function products()
    {
        return $this->hasMany(Products::class, 'codeProd');
    }

    
    public function commandes()
    {
        return $this->hasMany(Commandes::class, 'centenir', 'codeCom', 'codeProd');
    }
}
