<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'name' => 'Rheyvanda Shevta Ersananda',
        'age' => 17,
    ]);
});

Route::get('/hello',function () {
    return 'Hello Laravel!';
});