<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class TicketController extends Controller
{
      /**
     * index
     *
     * @return void
     */

     public function index(): View
     {
         $tickets = Ticket::latest()->paginate(10);


         return view('ticket.index', compact('tickets'));
     }


    /**
     * create
     *
     * @return View
     */

     public function create(): View
     {
         return view('ticket.create');
     }

     /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'no_telp' => 'required|max:13',
            'no_fax' => 'required',
            'pekerjaan' => 'required',
            'usia' => 'required',
            'layanan' => 'required',
            'tanggal' => 'required',
            'petugas' => 'required',
            'status' => 'required',
            'survey' => 'required',
        ]);

        Ticket::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'negara' => $request->negara,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'no_telp' => $request->no_telp,
            'no_fax' => $request->no_fax,
            'pekerjaan' => $request->pekerjaan,
            'usia' => $request->usia,
            'layanan' => $request->layanan,
            'tanggal' => $request->tanggal,
            'petugas' => $request->petugas,
            'status' => $request->status,
            'survey' => $request->survey,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dibuat');
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $ticket = Ticket::findOrFail($id);

        return view('ticket.show', compact('ticket'));
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */

    public function edit(string $id): View
    {
        $ticket = Ticket::findOrFail($id);

        return view('ticket.edit', compact('ticket'));
    }

     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */

    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'no_telp' => 'required|max:13',
            'no_fax' => 'required',
            'pekerjaan' => 'required',
            'usia' => 'required',
            'layanan' => 'required',
            'tanggal' => 'required',
            'petugas' => 'required',
            'status' => 'required',
            'survey' => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);

        $ticket->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'negara' => $request->negara,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'no_telp' => $request->no_telp,
            'no_fax' => $request->no_fax,
            'pekerjaan' => $request->pekerjaan,
            'usia' => $request->usia,
            'layanan' => $request->layanan,
            'tanggal' => $request->tanggal,
            'petugas' => $request->petugas,
            'status' => $request->status,
            'survey' => $request->survey,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diupdate');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */

     public function destroy(string $id): RedirectResponse
     {
         $ticket = Ticket::findOrFail($id);
         $ticket->delete();

         return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus');
     }
}
