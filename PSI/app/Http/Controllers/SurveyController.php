<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SurveyController extends Controller
{
    public function index(): View
    {
        $surveys = Survey::latest()->paginate(10);
        return view('surveys.index', compact('surveys'));
    }

    public function create($umkmId, $layananId): View
    {
        $layanan = Layanan::where('id', $layananId)->where('umkm_id', $umkmId)->firstOrFail();

        if ($layanan->status !== 'selesai') {
            $layanan->status = 'selesai';
            $layanan->save();
        }

        return view('surveys.create', compact('layanan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'survey' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:255',
        ]);

        Survey::create($request->only('layanan_id', 'survey', 'komentar'));

        return redirect()->route('surveys.index')->with('success', 'Survey created successfully.');
    }

    public function show($id): View
    {
        $survey = Survey::with('layanan.umkm')->findOrFail($id);
        return view('surveys.show', compact('survey'));
    }

    public function edit($id): View
    {
        $survey = Survey::findOrFail($id);
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $survey = Survey::findOrFail($id);

        $request->validate([
            'survey' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:255',
        ]);

        $survey->update($request->only('survey', 'komentar'));

        return redirect()->route('surveys.index')->with('success', 'Survey updated successfully.');
    }
}

