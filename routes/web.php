<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageProcessController;

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


Route::get('/dashboard', [ImageProcessController::class, 'dash'])
    ->middleware(['auth', 'verified']) // Apply auth and email verification middleware
    ->name('dashboard');

Route::get('/import-csv', function () {
    return view('uploadimages');
})->middleware(['auth', 'verified'])->name('uploadimages');
Route::get('/image-list', [ImageProcessController::class, 'imageList'])
    ->middleware(['auth', 'verified']) // Apply auth and email verification middleware
    ->name('image.list');

    Route::get('/ready-qa', [ImageProcessController::class, 'imageListQcReady'])
    ->middleware(['auth', 'verified']) // Apply auth and email verification middleware
    ->name('ready.qa');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/complete', [ImageProcessController::class, 'complete_list'])->middleware(['auth', 'verified'])->name('complete');
Route::get('/complete/{id}', [ImageProcessController::class, 'showComplete'])->middleware(['auth', 'verified'])->name('complete.showComplete');
Route::get('/image-list/{id}', [ImageProcessController::class, 'show'])->middleware(['auth', 'verified'])->name('image.show');
Route::post('/image-list/{id}', [ImageProcessController::class, 'saveimage'])->middleware(['auth', 'verified'])->name('image.saveimage');
Route::get('/ready-qa/{id}', [ImageProcessController::class, 'showQa'])->middleware(['auth', 'verified'])->name('image.showQa');
Route::post('/ready-qa/{id}', [ImageProcessController::class, 'saveimage'])->middleware(['auth', 'verified'])->name('ready.saveimage');
Route::post('/import-csv', [ImageProcessController::class, 'importCsv'])->name('imageprocess.import');
Route::get('/export-csv', [ImageProcessController::class, 'exportCsv'])->middleware(['auth', 'verified'])->name('export.csv');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('block.register'); // Apply the middleware
Route::get('/imageprocess', [ImageProcessController::class, 'updateImagesAll'])->middleware(['auth', 'verified'])->name('imageprocess.updateImagesAll');
Route::delete('/imageprocess/{id}', [ImageProcessController::class, 'destroy'])->name('imageprocess.destroy');
Route::post('/imageprocess/all/', [ImageProcessController::class, 'removeAll'])->name('imageprocess.removeAll');
require __DIR__.'/auth.php';