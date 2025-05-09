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
        $data = $request->isJson() ? $request->json()->all() : $request->all();
    
        $request->validate([
            'target' => 'required',
            'message' => 'required',
        ]);
    
        $response = Http::withHeaders([
            'Authorization' => 'sJKyRptUdnqLVpKCHHvF',
        ])->post('https://api.fonnte.com/send', [
            'target' => $data['target'],
            'message' => $data['message'],
        ]);
    
        return response()->json(json_decode($response, true));
    }
}   
