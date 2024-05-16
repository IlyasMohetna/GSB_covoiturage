<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $primaryKey = 'id_reservation';
    protected $guarded = [];
    protected $casts = [
        'date_de_reservation' => 'datetime',
    ];

    public function covoitureur()
    {
        return $this->hasOne(User::class, 'code_employe', 'code_employe');
    }

    public function etape_depart()
    {
        return $this->hasOne(Etape::class, 'id_etape', 'id_etape_depart');
    }

    public function etape_arrive()
    {
        return $this->hasOne(Etape::class, 'id_etape', 'id_etape_arrive');
    }

    public function trajet()
    {
        return $this->hasOne(Trajet::class, 'id_trajet', 'id_trajet');
    }

}
