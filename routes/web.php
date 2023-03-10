<?php

use Dompdf\Dompdf;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaHistoriController;

Route::resource('login', LoginController::class);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware('login')->group(
    function () {
        //ROUTER ADMIN
        Route::get('/admin', [DashboardController::class, 'index'])->middleware('admin');
        Route::resource('/admin/kelas', KelasController::class)->parameter('kelas', 'kelas')->middleware('admin');
        Route::resource('/admin/spp', SppController::class)->middleware('admin');
        Route::resource('/admin/petugass', PetugasController::class)->middleware('admin');
        Route::resource('/admin/siswa', SiswaController::class)->middleware('admin');
        Route::resource('/admin/tunggakan', TunggakanController::class)->middleware('admin');
        Route::resource('/admin/pembayaran', PembayaranController::class)->middleware('admin');
        Route::get('/admin/histori', [PembayaranController::class, 'histori'])->middleware('admin');
        Route::get('/users/export', [PembayaranController::class, 'export'])->name('users.export')->middleware('admin');

        //ROUTER PETUGAS
        Route::get('/petugas', [DashboardController::class, 'petugas'])->middleware('petugas');
        Route::get('/admin/petugas/tunggakan', [TunggakanController::class, 'petugas'])->middleware('petugas');
        // Route::resource('/admin/petugas/pembayaran', PembayaranController::class)->middleware('petugas');
        Route::get('/admin/petugas/histori', [PembayaranController::class, 'histori'])->middleware('petugas');

        Route::get('/generateLaporan', function () {
            $history = Pembayaran::all();
            $dompdf = new Dompdf();
            $html = view('admin.pembayaran.pdf', compact('history'))->render();
            $dompdf->loadHtml($html);
            $dompdf->render();
            return $dompdf->stream('Laporan Pembayaran.pdf');
        })->middleware('admin');

        //ROUTER SISWA
        Route::get('/siswas', fn () => view('siswas.index'))->middleware('siswa')->name('siswas.index');
        Route::resource('/admin/siswas/histori', SiswaHistoriController::class)->middleware('siswa');
    }

);
