<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Commandes;
use App\Models\BagPro;
use App\Models\Centenir;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'color',
        'category',
        'brand',
        'stock',
        'image_url',
    ];
    protected $casts = [
        'size' => 'array',
        'color' => 'array',
    ];
    public function bagPro()
    {
        return $this->hasMany(BagPro::class, 'codeProd');
    }
    public function Centenir()
    {
        return $this->BelongsToMany(Centenir::class, 'codeProd');
    }
}
