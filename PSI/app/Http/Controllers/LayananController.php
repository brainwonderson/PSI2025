<?php
namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    public function create($umkm)
    {
        $umkm = UMKM::findOrFail($umkm);
    
        // Optionally update status ke 'verifikasi' di sini
        if ($umkm->status !== 'verifikasi') {
            $umkm->status = 'verifikasi';
            $umkm->save();
        }
    
        return view('layanans.create', compact('umkm'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'umkm_id' => 'required|exists:umkms,id',
            'jenis_layanan' => 'required',
            'isi_layanan' => 'required',
            'tanggal_layanan' => 'required|date',
            'petugas_layanan' => 'required',
            'zoom' => 'nullable',
            'no_telpon' => 'required',
            'umkm_id' => 'required|exists:umkms,id'
        ]);

        Layanan::create([
            'umkm_id' => $request->umkm_id,
            'jenis_layanan' => $request->jenis_layanan,
            'isi_layanan' => $request->isi_layanan,
            'tanggal_layanan' => $request->tanggal_layanan,
            'petugas_layanan' => $request->petugas_layanan,
            'zoom' => $request->zoom,
            'no_telpon' => $request->no_telpon,
            // optional: menyimpan foreign key jika kamu menambahkan relasi umkm_id
        ]);
        

        return redirect()->route('umkms.index')->with('success', 'Layanan berhasil dibuat.');
    }
}

