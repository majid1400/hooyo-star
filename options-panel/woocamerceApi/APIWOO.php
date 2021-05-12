<?php

class APIWOO
{

    private $url;
    private $arr_header;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $hsp_settings = get_option('hsp_settings', []);
        $options = $hsp_settings['api'];
        $base64Credentials = base64_encode($options['consumer_key'] . ":" . $options['consumer_password']);
        $this->arr_header = "Authorization: Basic " . $base64Credentials;
        $this->url = 'https://hooyo.ir/';
    }

    public function get($endpoint, $method, $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . 'wp-json/star/v1/' . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                $this->arr_header,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            return "Error in cURL : " . curl_error($curl);
        }

        curl_close($curl);

        return json_decode($response);
    }
}
