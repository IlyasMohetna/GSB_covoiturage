<?php 

namespace App\Services;

use App\Models\Reservation;
use App\Models\Trajet;
use Carbon\Carbon;
use Mail;
use App\Mail\CovoiturageConfirmedMail;

class ReservationService
{
    public function getReservations($employeeCode)
    {
        return Reservation::where('code_employe', $employeeCode)
            ->with('etape_depart.ville', 'etape_arrive.ville', 'trajet.etapes')
            ->latest()
            ->get();
    }

    public function createReservation($trajetId, $data, $employeeCode)
    {
        $data['code_employe'] = $employeeCode;
        $data['date_de_reservation'] = Carbon::now();
        $data['id_trajet'] = $trajetId;
        return Reservation::create($data);
    }

    public function sendReservationConfirmation($reservation)
    {
        Mail::to('collaborateur@gsblaboratoire.fr')->send(new CovoiturageConfirmedMail($reservation));
    }
}
