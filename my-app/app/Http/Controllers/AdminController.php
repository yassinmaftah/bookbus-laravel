<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Programme;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            $totalReservations = Reservation::count();
            $todayReservations = Reservation::whereDate('created_at', today())->count();
            $totalBuses = Bus::count();
            
            // Simplified revenue calculation
            $totalRevenue = Reservation::where('status', 'payé')->count() * 150; // Average price

            $stats = [
                'total_reservations' => $totalReservations,
                'today_reservations' => $todayReservations,
                'total_revenue' => $totalRevenue,
                'total_buses' => $totalBuses,
            ];

            $recent_reservations = Reservation::with(['user', 'programme.route'])
                ->latest()
                ->take(10)
                ->get();

            return view('admin.dashboard', compact('stats', 'recent_reservations'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function reservations()
    {
        $reservations = Reservation::with(['user', 'programme.route', 'programme.bus'])
            ->latest()
            ->paginate(20);

        return view('admin.reservations', compact('reservations'));
    }

    public function buses()
    {
        $buses = Bus::withCount('programmes')->paginate(20);
        return view('admin.buses', compact('buses'));
    }

    public function routes()
    {
        $routes = Route::with('segments')->paginate(20);
        return view('admin.routes', compact('routes'));
    }
}
