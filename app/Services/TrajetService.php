<?php 

namespace App\Services;

use App\Models\Trajet;
use App\Models\Etape;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TrajetService
{
    public function createTrajet($data, $employeeCode)
    {
        $data['code_employe'] = $employeeCode;
        return Trajet::create($data);
    }

    public function createEtapes($trajetId, $startLocation, $startDate, $steps, $arrivingDates, $endLocation)
    {
        Etape::create([
            'ordre_etape' => 0,
            'date_passage' => Carbon::createFromFormat('d/m/Y H:i', $startDate),
            'id_trajet' => $trajetId,
            'id_ville' => $startLocation,
        ]);

        foreach ($steps ?? [] as $ordre => $step) {
            Etape::create([
                'ordre_etape' => $ordre + 1,
                'date_passage' => Carbon::createFromFormat('d/m/Y H:i:s', $arrivingDates[$ordre]),
                'id_trajet' => $trajetId,
                'id_ville' => $step,
            ]);
        }

        Etape::create([
            'ordre_etape' => count($steps ?? []) + 1,
            'date_passage' => Carbon::createFromFormat('d/m/Y H:i:s', end($arrivingDates)),
            'id_trajet' => $trajetId,
            'id_ville' => $endLocation,
        ]);
    }

    public function getTrajets($employeeCode)
    {
        return Trajet::where('code_employe', $employeeCode)
            ->with('etapes.ville', 'reservations.covoitureur')
            ->latest()
            ->get();
    }

    public function findTrajetById($id)
    {
        return Trajet::with(['etapes.ville', 'reservations.covoitureur'])->findOrFail($id);
    }

    public function searchTrajets($id_ville_depart, $id_ville_arrive, $departDate)
    {
        $query = Trajet::query()
            ->join('etape as depart', 'depart.id_trajet', '=', 'trajet.id_trajet')
            ->where('depart.id_ville', $id_ville_depart)
            ->whereDate('depart.date_passage', $departDate)
            ->where('depart.date_passage', '>', now())
            ->whereExists(function ($query) use ($id_ville_arrive) {
                $query->select(DB::raw(1))
                    ->from('etape as arrive')
                    ->whereColumn('arrive.id_trajet', 'depart.id_trajet')
                    ->where('arrive.id_ville', $id_ville_arrive)
                    ->whereRaw('arrive.ordre_etape > depart.ordre_etape');
            })
            ->with(['etapes.ville', 'automobiliste.agence.ville', 'automobiliste.fonction'])
            ->select('trajet.*')
            ->distinct();
            sleep(2);
        return $query->get();
    }
}
