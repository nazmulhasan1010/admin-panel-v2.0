<?php

use App\Http\Controllers\admin\pageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [pageController::class,'index']);
