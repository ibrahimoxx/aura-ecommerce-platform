<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Bag;

class BagPro extends Model
{
    protected $table = 'bag_Pro';
    protected $fillable = ['codeBag','codeProd', 'quantity','totalPrix'];
    

    public function bag()
    {
        return $this->belongsTo(Bag::class, 'codeBag');
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'codeProd');
    }
}
