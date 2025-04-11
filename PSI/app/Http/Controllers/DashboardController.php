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

        $surveyData = [
            'Sangat Baik' => Ticket::whereBetween('survey', [88.31, 100.00])->count(),
            'Baik' => Ticket::whereBetween('survey', [76.61, 88.30])->count(),
            'Kurang Baik' => Ticket::whereBetween('survey', [65.00, 76.60])->count(),
            'Tidak Baik' => Ticket::whereBetween('survey', [25.00, 64.99])->count(),
        ];
        

        return view('dashboard', compact('totalTickets', 'bukaTickets', 'selesaiTickets', 'surveyData'));
    }

}
