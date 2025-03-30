<?php

namespace App\Http\Controllers;
use App\Library\Zoom_Api;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function test()
    {
        $zoom_meeting = new Zoom_Api();

        date_default_timezone_set('Asia/Kolkata');

        $data = [
            'topic'      => 'Layanan',
            'start_date' => date("Y-m-d H:i:s", strtotime('+1 day')), // Besok
            'duration'   => 30,
            'type'       => 2,
            'password'   => '123456',
        ];

        try {
            $response = $zoom_meeting->createMeeting($data);
            dd($response);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
