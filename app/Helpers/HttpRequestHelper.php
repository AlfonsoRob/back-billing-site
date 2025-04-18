<?php
namespace App\Helpers;

class HttpRequestHelper
{
    public static function makeRequest_ApiFactura(string $endPoint, array $payload = [], string $method = 'POST')
    {
        $endPoint = env("URL_API_FACTURA_COM") . $endPoint;
        $curl = curl_init();

        $options = [
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 180,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => strtoupper($method),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'F-PLUGIN: 9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
                'F-Api-Key: ' . env('API_KEY_FACTURA_COM'),
                'F-Secret-Key: '  . env('SECRET_KEY_FACTURA_COM')
            ),
        ];

        if (!empty($payload)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($payload);
        }

        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new \Exception("cURL Error: {$error}");
        }

        curl_close($curl);
        return $response;
    }
}