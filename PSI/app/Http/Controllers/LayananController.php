<?php
namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LayananController extends Controller
{
    public function index(): View
    {
        $layanans = Layanan::with('umkm')->get();
        return view('layanans.index', compact('layanans'));
    }

    public function create($umkmId): View
    {
        $umkm = Umkm::findOrFail($umkmId);

        if ($umkm->status !== 'verifikasi') {
            $umkm->status = 'verifikasi';
            $umkm->save();
        }

        return view('layanans.create', compact('umkm'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'umkm_id' => 'required|exists:umkms,id',
            'jenis_layanan' => 'required',
            'isi_layanan' => 'required',
            'tanggal_layanan' => 'required|date',
            'petugas_layanan' => 'required',
            'zoom' => 'nullable',
            'no_telpon' => 'required',
            'pesan' => 'nullable|string|max:255',
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanans.index')->with('success', 'Layanan berhasil dibuat.');
    }

    public function updateStatus($id, $status): RedirectResponse
    {
        $validStatuses = ['buka', 'selesai'];

        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $layanan = Layanan::findOrFail($id);
        $layanan->status = $status;
        $layanan->save();

        return redirect()->back()->with('success', 'Status layanan diperbarui ke: ' . ucfirst($status));
    }

    public function edit($id): View
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanans.edit', compact('layanan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_layanan' => 'required|string|max:255',
            'isi_layanan' => 'required|string',
            'tanggal_layanan' => 'required|date',
            'petugas_layanan' => 'required|string|max:255',
            'zoom' => 'nullable|string|max:255',
            'no_telpon' => 'required|string|max:20',
            'pesan' => 'nullable|string|max:255',
            'status' => 'required|in:buka,selesai',
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());

        return redirect()->route('layanans.index')->with('success', 'Data layanan berhasil diperbarui.');
    }


}
