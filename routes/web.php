<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Git\GitController;

Route::get('/', [GitController::class, 'index'])
        ->name('home');

Route::get('/issue', [GitController::class, 'detail'])
        ->name('detail');
