<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    $tdata = [];
    $response = Http::get('http://api.mly.co.il');
    $data = str_replace('"', "", $response);
    $data = str_replace('[', "", $data);
    $data = str_replace(']', "", $data);
    $data = explode(",", $data);
    $sum = 0;
    foreach ($data as $index => $item) {
        for ($i = 0; $i < strlen($item); $i++) {
            if ($i % 2 != 0) {
                $sum += $item[$i] * 2 >= 10 ? 2 * $item[$i] % 10 + (2 * $item[$i] - 2 * $item[$i] % 10) / 10 : $item[$i] * 2;
            } else {
                $sum += $item[$i];
            }
        }
        if ($sum % 10 == 0) {
            array_push($tdata, $item);
        }
        $sum = 0;
    }
    $all = count($tdata);
    $tdata = array_chunk($tdata, 100);
    //dd($tdata[4]);
    //dd($tdata);
    //dd($tdata->count());
    ($tdata);

    return view('mly', compact('tdata', 'all'));
});
