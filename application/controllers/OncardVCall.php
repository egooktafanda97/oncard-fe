<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class OncardVCall extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Agivest_model');
        $this->load->model('Home_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper('html');
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
        // $this->load->library('curl');
    }

    protected $statsSent = 0;

    //-------------------------Tampilan Dashboard-------------------------------------------------


    public function index()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        
            $data = [];
            $this->load->view('user/_all/vcall_index.php', $data);
          
    }

    public function createMeetingOld(){
        $data = [];
        

        
        $this->load->view('video_call_oncard/index.php', $data);   
    }

    private $api_key = 'RkjA0ZfATqq5a4HSI18UhA';
    private $api_secret = 'rTvtGAsC26bkhU53cv2dyZfeaIfPOQsf';
    private $api_base_url = 'https://api.zoom.us/v2';

    public function createMeeting()
    {
        // Load the HTTP client library
        // $this->load->library('curl');

        // Set your Zoom API Key and Secret
        $apiKey = $this->api_key;
        $apiSecret = $this->api_secret;

        // Set the Zoom API endpoint
        $apiEndpoint = $this->api_base_url . '/users/{userId}/meetings';

        // Set the user ID on behalf of whom the meeting will be created
        $userId = 'Juz2_eTHR4GXHdg0gySoQ'; // Replace with the actual user ID

        // Set the access token
        $accessToken = $this->generateZoomAccessToken($apiKey, $apiSecret);

        // Set the meeting details
        $meetingDetails = [
            'topic' => 'Your Meeting Topic',
            'type' => 2, // 1 for instant meeting, 2 for scheduled meeting
            'start_time' => '2023-01-01T12:00:00Z',
            'duration' => 3,
            'timezone' => 'UTC',
        ];

        // Make the API request to create a meeting
        $response = $this->createZoomMeeting($apiEndpoint, $userId, $accessToken, $meetingDetails);

        // Handle the response (you can customize this based on your needs)
        if ($response && $response['status'] == 201) {
            // Meeting created successfully
            echo 'Meeting created successfully. Meeting ID: ' . $response['data']['id'];
        } else {
            // Failed to create meeting
            echo 'Failed to create meeting. Error: ' . json_encode($response);
        }
    }

    private function generateZoomAccessToken($apiKey, $apiSecret)
    {
        // Use your API key and secret to generate an access token
        $url = $this->api_base_url . '/oauth/token?grant_type=client_credentials';

        // $response = $this->curl->simple_post($url, [], [
        //     'auth' => [
        //         'username' => $apiKey,
        //         'password' => $apiSecret,
        //     ],
        // ]);

        $response = curl_request_noheader($url, [
            'auth' => [
                'username' => $apiKey,
                'password' => $apiSecret,
            ],
        ]);

        $data = json_encode($response);

        return $data['access_token'];
    }

    private function createZoomMeeting($apiEndpoint, $userId, $accessToken, $meetingDetails)
    {
        // Make the HTTP request to create a Zoom meeting
        $url = str_replace('{userId}', $userId, $apiEndpoint);

        // $response = $this->curl->simple_post($url, $meetingDetails, [
        //     'headers' => [
        //         'Authorization: Bearer ' . $accessToken,
        //         'Content-Type: application/json',
        //     ],
        // ]);

        $response = curl_request($url, 
        [
            'headers' => [
                'Authorization: Bearer ' . $accessToken,
                'Content-Type: application/json',
            ],
        ],$meetingDetails
    );

        return [
            'status' => $this->curl->info['http_code'],
            'data' => json_decode($response, true),
        ];
    }
       

}
