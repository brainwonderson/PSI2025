<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Survey;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * index
     *
     * @return void
     */

     public function index()
     {
        $surveys = Survey::latest()->paginate(10);
         return view('surveys.index', compact('surveys'));
     }

     /**
     * create
     *
     * @return View
     */
    public function create($layananId): View
    {
        $layanan = Layanan::findOrFail($layananId);

        // Ubah status menjadi 'selesai' jika belum
        if ($layanan->status !== 'selesai') {
            $layanan->status = 'selesai';
            $layanan->save();
        }

        return view('surveys.create', compact('layanan'));
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
            'layanan_id' => 'required|exists:layanans,id',
            'survey' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:255',
        ]);

        Survey::create([
            'layanan_id' => $request->layanan_id,
            'survey' => $request->survey,
            'komentar' => $request->komentar,
            session()->put('last_layanan_id', $request->layanan_id),

        ]);

        return redirect()->route('surveys.index')->with('success', 'Survey created successfully.');
     }

     public function show($id)
    {
        $survey = Survey::with('layanan.umkm')->findOrFail($id);
        return view('surveys.show', compact('survey'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */

     public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $survey = Survey::findOrFail($id);

        $request->validate([
            'survey' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:255',
        ]);

        $survey->update([
            'survey' => $request->survey,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('surveys.index')->with('success', 'Survey updated successfully.');
    }


}
