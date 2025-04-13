<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function showForm()
    {
        return view('send-wa');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'target' => 'required',
            'message' => 'required',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'sJKyRptUdnqLVpKCHHvF',
        ])->post('https://api.fonnte.com/send', [
            'target' => $request->input('target'),
            'message' => $request->input('message'),
        ]);

        $result = json_decode($response, true);

        return back()->with('status', $result);
    }
}
