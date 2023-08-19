<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vueController;
use App\Http\Controllers\controlTab;
use App\Http\Controllers\DirectionsOfExpensesControlle;
use App\Http\Controllers\LegalAdministrationСontroller;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/NameTransformation',[vueController::class,'index']);

Route::apiResources([
    'NameTransformation'=>vueController::class,
    'DirectionsOfExpenses'=>DirectionsOfExpensesControlle::class,
    'LegalAdministration'=>LegalAdministrationСontroller::class,
    
]);
// Route::get('/export',[controlTab::class,'export']);
// Route::get('/upload',[controlTab::class,'upload']);