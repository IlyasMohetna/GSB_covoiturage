<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $table = 'trajet';
    protected $primaryKey = 'id_trajet';
    protected $guarded = [];

    public function automobiliste()
    {
        return $this->hasOne(User::class, 'code_employe', 'code_employe');
    }

    public function etapes()
    {
        return $this->hasMany(Etape::class, 'id_trajet', 'id_trajet');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_trajet', 'id_trajet');
    }
}
