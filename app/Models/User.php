<?php 

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasRoles;

    // protected $fillable = ['utilisateur', 'mot_de_passe'];
    protected $table = 'employe';
    protected $primaryKey = 'code_employe';
    public $timestamps = true;
    protected $guarded = [];

    public function getAuthPassword(){  
        return $this->mot_de_passe;
    }

    public function setPasswordAttribute($value)
    {
        $this->mot_de_passe = bcrypt($value);
    }

    //--- Jointure

    public function fonction()
    {
        return $this->hasOne(Fonction::class, 'code_fonction', 'code_fonction');
    }

    public function agence()
    {
        return $this->hasOne(Agence::class, 'id_agence', 'id_agence');
    }
}
