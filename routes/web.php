
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Server\HomeController;
// use App\Http\Controllers\Server\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\BioWisataController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('keyword');
// Route::get('/', [BioWisataController::class, 'index'])->name('keyword');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/wisata/view-add', [HomeController::class, 'viewAddWisata'])->name('view.add.wisata');
Route::post('/wisata/add', [HomeController::class, 'addWisata'])->name('add.wisata');
Route::get('/wisata/view-edit/{id}', [HomeController::class, 'viewEditWisata'])->name('view.edit.wisata');
Route::post('/wisata/edit/{id}', [HomeController::class, 'editWisata'])->name('detail_wisata');
Route::get('/wisata/delete/{id}', [HomeController::class, 'deleteWisata'])->name('delete.wisata');
Route::get('/wisata/cari', [HomeController::class, 'cari']);


//pengunjung
Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
//Biodata
Route::get('/bio_wisata', [BioWisataController::class, 'index'])->name('BioWisata');



// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Route API Data Wisata
Route::get('/wisata/geojson', [FrontController::class, 'geojson']);
Route::get('/wisata/{id_wisata}', [FrontController::class, 'lokasi']);
