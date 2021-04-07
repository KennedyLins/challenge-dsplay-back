<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiInstagramController;


/*Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('dados22',[ApiInstagramController::class, 'index']);

Route::get('input', function () {
    return view('input');
});