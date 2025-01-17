<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;
use App\Models\BagPro;

class Bag extends Model
{
    protected $table = 'bag';
    protected $fillable = ['idClient'];
    public function client()
    {
        return $this->belongsTo(User::class, 'idClient');
    }

    public function bagPro()
    {
        return $this->hasMany(Products::class, 'codeBag');
    }
}
