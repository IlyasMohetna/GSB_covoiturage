<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'departement';
    protected $primaryKey = 'departement_id';
    protected $guarded = [];

    public function region()
    {
        return $this->hasOne(Region::class, 'region_id', 'region_id');
    }
}
