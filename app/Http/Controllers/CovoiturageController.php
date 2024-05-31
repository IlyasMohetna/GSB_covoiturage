<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VehiculeService;
use App\Services\TrajetService;
use App\Services\ReservationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Trajet;
use App\Models\Vehicule;
use App\Models\ReleveKilo;
use App\Http\Requests\CreateVehiculePersoRequest;

class CovoiturageController extends Controller
{
    protected $vehiculeService;
    protected $trajetService;
    protected $reservationService;

    public function __construct(
        VehiculeService $vehiculeService,
        TrajetService $trajetService,
        ReservationService $reservationService
    ) {
        $this->vehiculeService = $vehiculeService;
        $this->trajetService = $trajetService;
        $this->reservationService = $reservationService;
    }

    public function vehicule_historique_show($id)
    {
        $vehicule = Vehicule::where('id_vehicule', $id)->with('trajets')->first();
        $yearsUsed = $vehicule->trajets
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        })
        ->map(function($trajets) {
            return count($trajets);
        });
        return view('covoiturage.vehicule_historique', ['yearsUsed' => $yearsUsed]);
    }

    public function vehicule_releve_kilometrique_show($id)
    {
        $vehicule = Vehicule::where('id_vehicule', $id)->with('releve')->first();
        return view('covoiturage.vehicule_releve', ['vehicule' => $vehicule]);
    }

    public function vehicule_releve_kilometrique_create(Request $request)
    {
        $request->validate([
            'id_vehicule' => 'required|integer|exists:vehicule,id_vehicule',
            'kilometrage' => 'required|numeric',
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|digits:4'
        ]);

        $vehicule = Vehicule::find($request->id_vehicule);

        ReleveKilo::create([
            'id_vehicule' => $request->id_vehicule,
            'kilometrage' => $request->kilometrage,
            'month' => $request->month,
            'year' => $request->year
        ]);

        return redirect()->back();
    }

    public function annonce_create_show()
    {
        $vehicules_perso = $this->vehiculeService->getPersonalvehicules(auth()->user()->code_employe);
        $vehicules_service = $this->vehiculeService->getServicevehicules(auth()->user()->id_agence);

        return view('covoiturage.create', [
            'vehicules_perso' => $vehicules_perso,
            'vehicules_service' => $vehicules_service,
        ]);
    }

    public function annonce_search_show()
    {
        return view('covoiturage.search');
    }

    public function annonces_show()
    {
        $trajets = $this->trajetService->getTrajets(auth()->user()->code_employe);
        return view('covoiturage.annonces', ['trajets' => $trajets]);
    }

    public function annonce_show($id)
    {
        $trajet = $this->trajetService->findTrajetById($id);
        $etapes = $trajet->etapes->map(function ($etape) use ($trajet) {
            $startReservations = $trajet->reservations->where('id_etape_depart', $etape->id_etape);
            $endReservations = $trajet->reservations->where('id_etape_arrive', $etape->id_etape);

            $etape->reservations = (object)[
                'start' => $startReservations,
                'end' => $endReservations,
            ];

            return $etape;
        });

        return view('covoiturage.annonce', [
            'trajet' => $trajet,
            'etapes' => $etapes,
        ]);
    }

    public function reservations_show()
    {
        $reservations = $this->reservationService->getReservations(auth()->user()->code_employe);
        return view('covoiturage.reservations', ['reservations' => $reservations]);
    }

    public function parc_show()
    {
        $vehicules_perso = $this->vehiculeService->getPersonalvehicules(auth()->user()->code_employe);
        $vehicules_service = $this->vehiculeService->getServicevehicules(auth()->user()->id_agence);

        return view('covoiturage.parc', [
            'vehicules_perso' => $vehicules_perso,
            'vehicules_service' => $vehicules_service,
        ]);
    }

    public function vehicule_perso_create_show()
    {
        return view('covoiturage.vehicule_create');
    }

    public function vehicule_perso_create_action(CreateVehiculePersoRequest $request)
    {
        $data = $request->only(['immatriculation', 'marque', 'model', 'annee_model', 'photo']);
        $this->vehiculeService->createPersonalvehicule($data, auth()->user()->code_employe);

        return redirect()->route('covoiturage.parc_show');
    }

    public function annonce_create_action(Request $request)
    {
        $data = [
            'nombre_place_maximum' => $request->NbPlace,
            'id_vehicule' => $request->vehicule_perso ?? $request->vehicule_service,
        ];
        $trajet = $this->trajetService->createTrajet($data, auth()->user()->code_employe);

        if ($trajet) {
            $this->trajetService->createEtapes(
                $trajet->id_trajet,
                $request->startLocation,
                $request->DateTimeDepart,
                $request->steps,
                $request->arriving_dates,
                $request->endLocation
            );
        }

        return redirect()->route('covoiturage.annonces_show');
    }

    public function annonce_search_action(Request $request)
    {
        $id_ville_depart = $request->depart;
        $id_ville_arrive = $request->arrive;
        $departDate = Carbon::createFromFormat('d/m/Y', $request->datedepart);

        $trajets = $this->trajetService->searchTrajets($id_ville_depart, $id_ville_arrive, $departDate);
        $data = $trajets->map(function ($trajet) use ($id_ville_depart, $id_ville_arrive) {
            return [
                'id_trajet' => $trajet->id_trajet,
                'reservation_count' => $trajet->reservation_count,
                'nombre_place_maximum' => $trajet->nombre_place_maximum,
                'full' => ($trajet->reservation_count >= $trajet->nombre_place_maximum),
                'automobiliste' => [
                    'initials' => $trajet->automobiliste->prenom[0] . $trajet->automobiliste->nom[0],
                    'name' => $trajet->automobiliste->prenom . ' ' . $trajet->automobiliste->nom,
                    'fonction' => $trajet->automobiliste->fonction->nom_fonction,
                    'agence' => $trajet->automobiliste->agence->nom_agence,
                    'agence_ville' => $trajet->automobiliste->agence->ville->nom,
                ],
                'point_depart' => [
                    'id_etape' => $trajet->etapes->where('id_ville', $id_ville_depart)->first()->id_etape,
                    'ville' => $trajet->etapes->where('id_ville', $id_ville_depart)->first()->ville->nom,
                    'date_passage' => $trajet->etapes->where('id_ville', $id_ville_depart)->first()->date_passage->format('d/m/Y H:i'),
                ],
                'point_arrive' => [
                    'id_etape' => $trajet->etapes->where('id_ville', $id_ville_arrive)->first()->id_etape,
                    'ville' => $trajet->etapes->where('id_ville', $id_ville_arrive)->first()->ville->nom,
                    'date_passage' => $trajet->etapes->where('id_ville', $id_ville_arrive)->first()->date_passage->format('d/m/Y H:i'),
                ],
            ];
        });

        return response()->json($data);
    }

    public function annonce_reserver(Request $request)
    {
        $trajet = Trajet::find($request->modal_id_trajet);
        if (!$trajet) {
            return response()->json(['error' => 'Trajet not found'], 404);
        }
        $data = [
            'id_etape_depart' => $request->modal_etape_depart,
            'id_etape_arrive' => $request->modal_etape_arrive,
        ];

        $reservation = $this->reservationService->createReservation($trajet->id_trajet, $data, auth()->user()->code_employe);
        $this->reservationService->sendReservationConfirmation($reservation);

        session(['reservation_success' => true]);
        return redirect()->route('covoiturage.reservation_confirmed_show');
    }

    public function vehicule_perso_available_search_action(Request $request)
    {
        $startDate = Carbon::createFromFormat('d/m/Y H:i', $request->startDate);
        $endDate = Carbon::createFromFormat('d/m/Y H:i:s', $request->endDate);

        $vehicules = $this->vehiculeService->getAvailablePersonalvehicules($startDate, $endDate, auth()->user()->code_employe);
        return response()->json($vehicules);
    }

    public function vehicule_service_available_search_action(Request $request)
    {
        $startDate = Carbon::createFromFormat('d/m/Y H:i', $request->startDate);
        $endDate = Carbon::createFromFormat('d/m/Y H:i:s', $request->endDate);

        $vehicules = $this->vehiculeService->getAvailableServicevehicules($startDate, $endDate, auth()->user()->id_agence);
        return response()->json($vehicules);
    }
}
