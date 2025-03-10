<?php

use Illuminate\Support\Facades\Route;

Route::get('/{page}', function () {

    return view('app');

})->where('page', '^(?!api|/).*$');
