<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

    protected $table = 'agence';
    protected $primaryKey = 'id_agence';
    protected $guarded = [];

    public function ville()
    {
        return $this->hasOne(Ville::class, 'id_ville', 'id_ville');
    }
}
