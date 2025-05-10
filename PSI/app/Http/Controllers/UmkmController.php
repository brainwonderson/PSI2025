<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UmkmController extends Controller
{
    public function index(): View
    {
        $umkms = Umkm::latest()->paginate(10);
        return view('umkms.index', compact('umkms'));
    }

    public function create(): View
    {
        return view('umkms.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'tanggal' => 'required|date',
            'negara' => 'required',
            'instansi' => 'required',
            'provinsi' => 'required',
            'jenis_perusahaan' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'no_fax' => 'nullable',
        ]);

        Umkm::create($request->all());

        return redirect()->route('umkms.index')->with('success', 'UMKM created successfully.');
    }

    public function updateStatus($id, $status): RedirectResponse
    {
        $validStatuses = ['open', 'verifikasi', 'cancel', 'close'];

        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $umkm = Umkm::findOrFail($id);
        $umkm->status = $status;
        $umkm->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui ke: ' . ucfirst($status));
    }
}