<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiInvoicesController;
use App\Http\Controllers\ApiClientsController;
use App\Http\Controllers\ApiCataloguesController;

Route::resource('/facturas', ApiInvoicesController::class);
Route::get('/facturas/{UID}/enviarMail', [ApiInvoicesController::class, 'sendInvoiceMail']);

Route::resource('/clientes', ApiClientsController::class);

//rutas catalogos
Route::get('/catalogos/uso_cfdi', [ApiCataloguesController::class, 'get_usoCFDI']);
Route::get('/catalogos/regFiscal', [ApiCataloguesController::class, 'get_regFiscal']);
