<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Ticket;
use App\Models\Umkm;
use Illuminate\View\View;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        $totalumkm = Umkm::distinct('nama')->count('nama');
        $LayananAktif = Layanan::where('status', 'Buka')->count();
        $LayananSelesai = Layanan::where('status', 'Selesai')->count();

        $surveyData = [
            'Sangat Baik' => Ticket::whereBetween('survey', [88.31, 100.00])->count(),
            'Baik' => Ticket::whereBetween('survey', [76.61, 88.30])->count(),
            'Kurang Baik' => Ticket::whereBetween('survey', [65.00, 76.60])->count(),
            'Tidak Baik' => Ticket::whereBetween('survey', [25.00, 64.99])->count(),
        ];
        

        return view('dashboard', compact('totalumkm', 'LayananAktif', 'LayananSelesai', 'surveyData'));
    }

}
