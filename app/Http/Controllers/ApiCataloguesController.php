<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpRequestHelper;

class ApiCataloguesController extends Controller
{
    public function get_usoCFDI(){
        $method = 'GET';
        $endPoint = "/v4/catalogo/UsoCfdi";

        $payload = [];

        $data =  json_decode(HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method),true);

        $return = [
            'success' => true,
            'data' => $data
        ];

        return json_encode($return);
    }

    public function get_regFiscal(){
        $method = 'GET';
        $endPoint = "/v3/catalogo/RegimenFiscal";

        $payload = [];

        $data =  json_decode(HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method),true);

        $return = [
            'success' => true,
            'data' => $data
        ];

        return json_encode($return);
    }
}
