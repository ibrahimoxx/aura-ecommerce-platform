<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{//
    use HasFactory;
    protected $primaryKey = 'codeProd';
    protected $table = 'produit';
    protected $fillable = ['name', 'description', 'price', 'stock','size','color','image_url'];
}
