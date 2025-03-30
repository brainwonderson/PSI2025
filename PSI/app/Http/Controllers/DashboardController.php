<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\View\View;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        $totalTickets = Ticket::count();
        $bukaTickets = Ticket::where('status', 'Buka')->count();
        $selesaiTickets = Ticket::where('status', 'Selesai')->count();

        return view('dashboard', compact('totalTickets', 'bukaTickets', 'selesaiTickets'));
    }

}
