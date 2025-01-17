<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commandes;
use App\Models\User;

class Livraison extends Model
{
    protected $table = 'livraison';

    protected $fillable = [
        'codeCom',
        'idClient',
        'dateLiv',
        'prixtotal',
        'status',
    ];

    public $timestamps = true;

    // Relationship with Commande
    public function commande()
    {
        return $this->belongsTo(Commandes::class, 'codeCom');
    }

    // Relationship with User (Client)
    public function client()
    {
        return $this->belongsTo(User::class, 'idClient');
    }
}
