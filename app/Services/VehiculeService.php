<?php 

namespace App\Services;

use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class VehiculeService
{
    public function getPersonalVehicules($employeeCode)
    {
        return Vehicule::where('code_employe', $employeeCode)->with('trajets')->get();
    }

    public function getServiceVehicules($agencyId)
    {
        return Vehicule::where('id_agence', $agencyId)->with('trajets')->get();
    }

    public function getAllServiceVehicules()
    {
        return Vehicule::where('type_vehicule', 'service')->get();
    }

    public function createPersonalVehicule($data, $employeeCode)
    {
        $data['code_employe'] = $employeeCode;
        $data['type_vehicule'] = 'perso';
        return Vehicule::create($data);
    }

    public function getAvailablePersonalVehicules($startDate, $endDate, $employeeCode)
    {
        return Vehicule::where('type_vehicule', 'perso')
            ->where('code_employe', $employeeCode)
            ->whereDoesntHave('trajets.etapes', function (Builder $query) use ($startDate, $endDate) {
                $query->whereBetween('date_passage', [$startDate, $endDate]);
            })->get();
    }

    public function getAvailableServiceVehicules($startDate, $endDate, $agencyId)
    {
        return Vehicule::where('type_vehicule', 'service')
            ->where('id_agence', $agencyId)
            ->whereDoesntHave('trajets.etapes', function (Builder $query) use ($startDate, $endDate) {
                $query->whereBetween('date_passage', [$startDate, $endDate]);
            })->get();
    }
}
