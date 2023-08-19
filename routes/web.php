
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerTable;
use App\Http\Controllers\controlTab;
use App\Http\Controllers\vueController;
use App\Http\Controllers\spaController;
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
// Route::get('/',[ControllerTable::class, 'index'])->name('index');
// Route::post('/',[ControllerTable::class, 'store']);
Route::get('/{any}', [spaController::class, 'index'] )->where('any','.*');//нужна для открытия vue
// Route::get('users/export/', [controlTab::class, 'upload']);