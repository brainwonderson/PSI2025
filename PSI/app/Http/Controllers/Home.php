<?php

namespace App\Http\Controllers;
use App\Library\Zoom_Api;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function createMeeting(Request $request)
    {
        $zoom_meeting = new \App\Library\Zoom_Api();
    
        $data = [
            'topic'      => $request->input('topic'),
            'start_date' => date("Y-m-d H:i:s", strtotime('+1 day')),
            'duration'   => $request->input('duration'),
            'type'       => 2,
            'password'   => '123456',
        ];
    
        try {
            $response = $zoom_meeting->createMeeting($data);
            return view('zoom.result', compact('response'));
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function generateZoom(Request $request)
{
    $zoom_meeting = new \App\Library\Zoom_Api();

    $data = [
        'topic'      => $request->input('topic', 'Meeting UMKM'),
        'start_date' => date("Y-m-d H:i:s", strtotime('+1 day')),
        'duration'   => $request->input('duration', 60),
        'type'       => 2,
        'password'   => '123456',
    ];

    try {
        $response = $zoom_meeting->createMeeting($data);
        return response()->json([
            'join_url' => $response['join_url'] ?? null
        ]);
    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }
}

    
}
