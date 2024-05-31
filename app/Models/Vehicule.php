<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $table = 'vehicule';
    protected $primaryKey = 'id_vehicule';
    protected $guarded = [];

    public function trajets()
    {
        return $this->hasMany(Trajet::class, 'id_vehicule', 'id_vehicule');
    }

    public function agence()
    {
        return $this->hasOne(Agence::class, 'id_agence', 'id_agence');
    }

    public function releve()
    {
        return $this->hasMany(ReleveKilo::class, 'id_vehicule', 'id_vehicule');
    }
}
