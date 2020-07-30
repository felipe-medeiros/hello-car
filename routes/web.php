<?php

use Illuminate\Support\Facades\Route;

Route::resource('cars', 'CarController');

Route::redirect('/', '/hello-car/public/cars');
