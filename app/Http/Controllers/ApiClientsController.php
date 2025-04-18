<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpRequestHelper;

class ApiClientsController extends Controller
{
   
    public function index()
    {
        $method = 'GET';
        $endPoint = "/v1/clients";

        $payload = [];

        $data =  json_decode(HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method),true);
        
        $collection = collect($data['data']);
        $dataReturn = $collection->map(function ($client) {
            return [
                'uid' => $client['UID'],
                'razon_social' => $client['RazonSocial'],
                'rfc' => $client['RFC'],
                'cp' => $client['CodigoPostal']
            ];
        });

        $return = [
            'success' => true,
            'data' => $dataReturn
        ];

        return json_encode($return);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $method = 'POST';
        $endPoint = "/v1/clients/create";

        $payload = [
            "rfc" => $request->rfc,
            "razons" => $request->razon_social,
            "codpos" => $request->codPos,
            "email" => $request->email,
            "usocfdi" => $request->selected_usoCFDI,
            "regimen" => $request->selected_regFiscal,
            "pais" => 'MEX'
        ];

        $dataReturn = json_decode(HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method));
        $return = [
            'success' => true,
            'data' => $dataReturn
        ];

        return json_encode($return);
    }

    
    public function show(string $rfc)
    {
        $method = 'GET';
        $endPoint = "/v1/clients/$rfc";

        $payload = [];

        return HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method);
    }

    
    public function edit(string $UID)
    {
        return $this->show($UID);
    }

    
    public function update(Request $request, string $UID)
    {

        $method = 'POST';
        $endPoint = "/v1/clients/$UID/update";

        $payload = [
            "rfc" => $request->rfc,
            "razons" => $request->razon_social,
            "codpos" => $request->codPos,
            "email" => $request->email,
            "usocfdi" => $request->selected_usoCFDI,
            "regimen" => $request->selected_regFiscal,
            "pais" => 'MEX'
        ];

        $dataReturn = json_decode(HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method));

        $return = [
            'success' => true,
            'data' => $dataReturn
        ];

        return json_encode($return);
    }

    
    public function destroy(string $UID)
    {
        $method = 'POST';
        $endPoint = "/v1/clients/destroy/$UID";

        $payload = [];

        $dataReturn = json_decode(HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method));
        $return = [
            'success' => true,
            'data' => $dataReturn
        ];

        return json_encode($return);
    }
}
