<?php
    function doGet($url, $data = '') {
        //$url = 'http://localhost:5002/v/user/list?limit=20';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);

        $response=json_decode($response_json);
        return $response;
    }

    function doPost($url, $data) {

        $baseUrl = 'http://asgnosara:8080/ApiModule.php/';
        //$baseUrl = 'https://reservas.cabanaslalaguna.com/ApiModule.php/';
        $url = $baseUrl . $url;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $json_data = json_encode((array) $data);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $resp = curl_exec($curl);        
        curl_close($curl);


        $responseJSON = json_decode($resp);
        return $responseJSON;
    }

?>