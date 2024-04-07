<?php

use App\Http\Controllers\CanvasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/canvas/fetch', [CanvasController::class, 'fetchCanvas']);
Route::post('/canvas/update/', [CanvasController::class, 'update'])->name('canvas.update');
