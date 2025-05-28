<?php

use App\Models\Rank;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('ranks', function () {
   $ranks = Rank::all();
   return view('rank', ['ranks' => $ranks]);
});