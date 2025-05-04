<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * index
     *
     * @return void
     */

    public function index() : View
    {
        $umkms = Umkm::latest()->paginate(10);

        return view('umkms.index', compact('umkms'));
    }

    /**
     * create
     *
     * @return void
     */

    public function create() : View
    {
        return view('umkms.create');
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request)
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
            'no_fax' => '',
        ]);

        Umkm::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal' => $request->tanggal,
            'negara' => $request->negara,
            'instansi' => $request->instansi,
            'provinsi' => $request->provinsi,
            'jenis_perusahaan' => $request->jenis_perusahaan,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'no_fax' => $request->no_fax,
        ]);

        return redirect()->route('umkms.index')->with('success', 'UMKM created successfully.');
    }

    public function updateStatus($id, $status)
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
