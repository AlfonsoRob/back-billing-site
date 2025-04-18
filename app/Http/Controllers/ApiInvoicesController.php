<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpRequestHelper;


class ApiInvoicesController extends Controller
{
    public function index(Request $request)
    {
        $method = 'POST';
        $endPoint = "/v4/cfdi/list";

        $payload = [
            "rfc" => $request->rfc,
            "page" => $request->page,
            "per_page" => 100
        ];

        return HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $UID, Request $request)
    {
        $method = 'POST';
        $endPoint = "/v4/cfdi40/$UID/cancel";

        $payload = [
            "motivo" => $request->motivo,
            "folioSustituto" => $request->motivo == '01' ? $request->folio_sustituto : ''
        ];

        return HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method);
    }

    public function sendInvoiceMail($UID){
        $method = 'GET';
        $endPoint = "/v4/cfdi40/$UID/email";
        $payload = [];

        return HttpRequestHelper::makeRequest_ApiFactura($endPoint, $payload, $method);
    }
}
