<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    public function showPaymentForm($id, Request $request)
    {
        $programme = Programme::with(['route.segments', 'bus'])->findOrFail($id);
        $passengers = $request->query('passengers', 1);
        $segment = $programme->route->segments->first();
        $prixUnitaire = $segment->tarif;
        $total = $prixUnitaire * $passengers;
        return view('reservation.payment', compact('programme', 'passengers', 'total', 'prixUnitaire'));
    }


    public function processPayment(Request $request)
    {
        $request->validate([
            'card_number' => 'required|numeric|digits:16',
            'cvv' => 'required|numeric|digits:3',
            'expiry_date' => 'required',
            'card_holder' => 'required|string',
        ]);

        $programmeId = $request->programme_id;
        $placesDemandees = $request->passengers;
        $placesReservees = Reservation::where('programme_id', $programmeId)->sum('nombre_places');

        if (($placesReservees + $placesDemandees) > 50)
            return back()->with('error', "Désolé ! Il ne reste que " . (50 - $placesReservees) . " places disponibles.");

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'programme_id' => $programmeId,
            'nombre_places' => $placesDemandees,
            'date_reservation' => now(),
            'status' => 'payé'
        ]);

        return redirect()->route('reservation.success', $reservation->id);
    }

    public function success($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.success', compact('reservation'));
    }

    public function downloadTicket($id)
    {
        $reservation = Reservation::with(['programme.route', 'user'])->findOrFail($id);
        $pdf = Pdf::loadView('reservation.ticket_pdf', compact('reservation'));
        return $pdf->download('ticket-satas-' . $reservation->id . '.pdf');
    }
}
