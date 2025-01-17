<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\User;
use App\Models\Centenir;

class Commandes extends Model
{
    protected $fillable = ['dateCom','adresse', 'idClient'];
    public function client()
    {
        return $this->belongsTo(User::class, 'idClient', 'id');
    }
    public function Centenir()
    {
        return $this->BelongsToMany(Centenir::class, 'centenir', 'codeCom', 'codeProd');
    }
    
}
