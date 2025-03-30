<?php

namespace App\Library;

date_default_timezone_set('Asia/Kolkata');

// Autoload dependencies
require_once __DIR__ . '/../../vendor/autoload.php';

class Zoom_Api
{
    private $client_id = 'Wo2H0p2CTm2ocqIL2rFtA';
    private $client_secret = 'MlCFj11dN6ZaEyjaxbsLHjqvUELITRZS';
    private $account_id = 'xze-NMkpQBqhBsyvYAIibQ';
    private $auth_url = 'https://zoom.us/oauth/token';
    private $base_url = 'https://api.zoom.us/v2';

    // Function to get OAuth access token
    private function getAccessToken()
    {
        $headers = [
            'Authorization: Basic ' . base64_encode($this->client_id . ':' . $this->client_secret),
            'Content-Type: application/x-www-form-urlencoded'
        ];

        $postData = http_build_query(['grant_type' => 'account_credentials', 'account_id' => $this->account_id]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->auth_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postData,
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        return $result['access_token'] ?? null;
    }

    // Function to create a meeting
    public function createMeeting($data = [])
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return ['error' => 'Failed to get access token'];
        }

        $post_time = $data['start_date'];
        $start_time = gmdate("Y-m-d\TH:i:s", strtotime($post_time));

        $createMeetingArray = [
            'topic'      => $data['topic'],
            'agenda'     => $data['agenda'] ?? '',
            'type'       => $data['type'] ?? 2,
            'start_time' => $start_time,
            'timezone'   => 'Asia/Kolkata',
            'password'   => $data['password'] ?? '',
            'duration'   => $data['duration'] ?? 60,
            'settings'   => [
                'join_before_host'  => $data['join_before_host'] ?? false,
                'host_video'        => $data['option_host_video'] ?? false,
                'participant_video' => $data['option_participants_video'] ?? false,
                'mute_upon_entry'   => $data['option_mute_participants'] ?? false,
                'enforce_login'     => $data['option_enforce_login'] ?? false,
                'auto_recording'    => $data['option_auto_recording'] ?? 'none',
            ]
        ];

        return $this->sendRequest($createMeetingArray, $token);
    }

    // Function to send request
    protected function sendRequest($data, $token)
    {
        $request_url = $this->base_url . "/users/me/meetings";

        $headers = [
            "Authorization: Bearer $token",
            "Content-Type: application/json",
            "Accept: application/json",
        ];

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $request_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        return $response ? json_decode($response, true) : $err;
    }
}

?>
