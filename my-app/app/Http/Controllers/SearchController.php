<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Route;
use App\Models\Programme;
use App\Models\Segment;

class SearchController extends Controller
{
    public function searchIndex(Request $request)
{
    $villes = Ville::all();
    $voyages = [];
    $segment = null;

    if ($request->has('ville_depart') && $request->has('ville_arrivee')) {
        $departId = $request->ville_depart;
        $arriveeId = $request->ville_arrivee;
        $date = $request->date_voyage;
        $segment = Segment::whereRelation('etapeDepart.gare', 'ville_id', $departId)
                          ->whereRelation('etapeArrivee.gare', 'ville_id', $arriveeId)
                          ->first();

        if ($segment)
        {
            $routeId = $segment->etapeDepart->route_id;
            // $routeId = $segment->etapeDepart->gare->ville_id;
            // dd($routeId);

            $query = Programme::where('route_id', $routeId)
                              ->with(['bus', 'route']);

            if (!empty($date))
                $query->whereDate('jour_depart', $date);
            $voyages = $query->get();
        }
    }

    return view('welcome', compact('villes', 'voyages', 'segment'));
}
}

// segment -> etap  (etape_depart_id)
// Etape -> Gare ( gare_id).
// Gare -> Ville ( ville_id).

// we have ville depart id and ville arrivee
// we need
// check if any segment has point depart in use choise ville_depart
// check if any segment has point arrivee in use choise ville_arrivee
