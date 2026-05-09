<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ann', function () {
    return response()->json([
        'message' => 'halo dwiyanti annisa',
        'status' => 'success'
    ]);
});