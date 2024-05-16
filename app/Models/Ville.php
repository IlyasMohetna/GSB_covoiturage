<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = 'ville';
    protected $primaryKey = 'id_ville';
    protected $guarded = [];

    public function departement()
    {
        return $this->hasOne(Departement::class, 'departement_id', 'departement_id');
    }
}
