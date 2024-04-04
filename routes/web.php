<?php

use App\Http\Controllers\CanvasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/canvas/fetch', [CanvasController::class, 'fetchCanvas']);
Route::get('/canvas', [CanvasController::class, 'index'])->name('canvas.index');
Route::post('/canvas/update/', [CanvasController::class, 'update'])->name('canvas.update');
