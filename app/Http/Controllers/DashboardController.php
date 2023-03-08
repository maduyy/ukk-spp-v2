<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Notif;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Tunggakan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all()->count();
        $kelas = Kelas::all()->count();
        $siswa = Siswa::all()->count();
        $tunggakan = Tunggakan::all()->count();
        $entri = Pembayaran::all()->count();
        $pembayaran = Pembayaran::all();
        $notif = Notif::latest()->limit(5)->get();


        return view('admin.index', compact('petugas', 'kelas', 'siswa', 'entri', 'tunggakan', 'notif', 'pembayaran'));
    }
    public function petugas()
    {
        $petugas = User::all()->count();
        $kelas = Kelas::all()->count();
        $siswa = Siswa::all()->count();
        $tunggakan = Tunggakan::all()->count();
        $entri = Pembayaran::all()->count();
        $pembayaran = Pembayaran::all();
        $notif = Notif::latest()->limit(5)->get();


        return view('admin.index', compact('petugas', 'kelas', 'siswa', 'entri', 'tunggakan', 'notif', 'pembayaran'));
    }
}
