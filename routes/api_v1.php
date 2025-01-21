<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TicketController;



// http://tickets-please.test/api/v1/tickets
// universal resource locator
// tickets
// users

Route::apiResource('tickets', TicketController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
