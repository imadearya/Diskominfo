<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PemkotController;

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
    return view('pages.sign-in');
});

// Route::get('/regis', function () {
//     return view('pages.sign-up');
// });

// Route::get('/admin/tables', function () {
//     return view('pages.tables');
// });
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    // ADMIN
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    //BENCANA
    Route::get('/admin/bencana', [AdminController::class, 'bencana']);
    Route::delete('/admin/bencana/{bencana_id}', [AdminController::class, 'destroyBencana'])->name('bencanaDestroy');
    Route::put('/admin/bencana/{bencana_id}', [AdminController::class, 'updateBencana'])->name('bencanaUpdate');
    Route::post('/admin/bencana', [AdminController::class, 'storeBencana'])->name('bencanaStore');
    Route::get('/admin/bencana/search', [AdminController::class, 'searchBencana'])->name('bencanaSearch');
    Route::post('/admin/bencana/dropdownAlatbencana', [AdminController::class, 'DropdownAlat'])->name('dropdownAlat');
    Route::get('/admin/get-category-bencana', [AdminController::class, 'getCategoryBencana'])->name('getCategoryBencana');

    //KERUSAKANNN
    Route::get('/admin/kerusakan', [AdminController::class, 'kerusakan']);
    Route::delete('/admin/kerusakan/{kerusakan}', [AdminController::class, 'destroyKerusakan'])->name('rusakDestroy');
    Route::put('/admin/kerusakan/{id}', [AdminController::class, 'updateKerusakan'])->name('rusakUpdate');
    Route::post('/admin/kerusakan', [AdminController::class, 'storeKerusakan'])->name('rusakStore');
    Route::get('/admin/kerusakan/search', [AdminController::class, 'searchKerusakan'])->name('rusakSearch');
    Route::post('/admin/bencana/dropdownAlatbencana', [AdminController::class, 'DropdownAlat'])->name('dropdownAlat');

    //KORBAN
    Route::get('/admin/korban', [AdminController::class, 'korban']);
    Route::delete('/admin/korban/{korban}', [AdminController::class, 'destroyKorban'])->name('korbanDestroy');
    Route::put('/admin/korban/{id}', [AdminController::class, 'updateKorban'])->name('korbanUpdate');
    Route::post('/admin/korban', [AdminController::class, 'storeKorban'])->name('korbanStore');
    Route::get('/admin/korban/search', [AdminController::class, 'searchKorban'])->name('korbanSearch');

    //Pengungsi
    Route::get('/admin/pengungsi', [AdminController::class, 'pengungsi']);
    Route::delete('/admin/pengungsi/{pengungsi}', [AdminController::class, 'destroyPengungsi'])->name('pengungsiDestroy');
    Route::put('/admin/pengungsi/{id}', [AdminController::class, 'updatePengungsi'])->name('pengungsiUpdate');
    Route::post('/admin/pengungsi', [AdminController::class, 'storePengungsi'])->name('pengungsiStore');
    Route::get('/admin/pengungsi/search', [AdminController::class, 'searchPengungsi'])->name('pengungsiSearch');

    //pPENAMPUNGANNNNNN
    Route::get('/admin/penampungan', [AdminController::class, 'penampungan']);
    Route::post('/admin/penampungan', [AdminController::class, 'storePenampungan'])->name('penampunganStore');
    Route::delete('/admin/penampungan/{penampungan}', [AdminController::class, 'destroyPenampungan'])->name('penampunganDestroy');
    Route::put('/admin/penampungan/{id}', [AdminController::class, 'updatePenampungan'])->name('penampunganUpdate');
    Route::get('/admin/penampungan/search', [AdminController::class, 'searchPenampungan'])->name('penampunganSearch');

    //AKUNNNNNNNNNNNNNNNNNNN
    Route::get('/admin/akun', [AdminController::class, 'akun']);
    Route::delete('/admin/akun/{user}', [AdminController::class, 'destroyAkun'])->name('akunDestroy');
    Route::post('/admin/akun', [AdminController::class, 'storeAkun'])->name('akunStore');
    Route::put('/admin/akun/{id}', [AdminController::class, 'updateAkun'])->name('akunUpdate');

    //ALATTTTTTTTTTTTTTTTTTT
    Route::get('/admin/alat', [AdminController::class, 'alat']);
    Route::post('/admin/alat', [AdminController::class, 'store'])->name('alatStore');
    Route::delete('/admin/alat/{alat}', [AdminController::class, 'destroy'])->name('alatDestroy');
    Route::put('/admin/alat/{id}', [AdminController::class, 'update'])->name('alatUpdate');
    Route::get('/admin/alat/search', [AdminController::class, 'searchAlat'])->name('alatSearch');
    Route::post('/admin/alat/dropdownAlat', [AdminController::class, 'DropdownAlat'])->name('dropdownAlat');

    
});


Route::group(['middleware'=>['isPemkot','auth','PreventBackHistory']], function(){
    Route::get('/pemkot', [PemkotController::class, 'index'])->name('pemkot');
    Route::get('/pemkot/statistik', [PemkotController::class, 'stat'])->name('statistik');
    Route::get('/pemkot/kerusakan', [PemkotController::class, 'kerusakan'])->name('kerusakan');
    Route::get('/pemkot/kerusakan/kantor', [PemkotController::class, 'kantor']);
    Route::get('/pemkot/bencana', [PemkotController::class, 'bencana'])->name('kerusakan');
    Route::get('/pemkot/bencana/banjir', [PemkotController::class, 'banjir'])->name('banjir');
    Route::get('/pemkot/korban', [PemkotController::class, 'korban'])->name('korban');

});

Route::get('/download-pdf', [PDFController::class, 'downloadPDF']);
Route::get('/download-pdf-banjir', [PDFController::class, 'downloadPDFBanjir']);
Route::get('/download-pdf-kantor', [PDFController::class, 'downloadPDFKantor']);