<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $table = 'etape';
    protected $primaryKey = 'id_etape';
    protected $guarded = [];
    protected $casts = [
        'date_passage' => 'datetime',
    ];

    public function trajet()
    {
        return $this->belongsTo(Trajet::class, 'id_trajet');
    }

    public function ville()
    {
        return $this->hasOne(Ville::class, 'id_ville', 'id_ville');
    }
}
