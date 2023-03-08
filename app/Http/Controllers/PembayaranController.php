<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notif;
use App\Models\Siswa;
use App\Models\Tunggakan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function histori()
    {
        $pembayaran = Pembayaran::all();
        return view('admin.pembayaran.histori', compact('pembayaran'));
    }
    public function export()
    {
        return Excel::download(new PembayaranExport(), 'laporan-pembayaran.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $tunggakan = Tunggakan::all();
        $siswa = Siswa::all();
        return view('admin.pembayaran.create', compact('siswa', 'tunggakan', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nisn' => ['required'],
            'user_id' => ['required'],
            'siswa_id' => ['required'],
            'tunggakan' => ['required'],
            'bulan_dibayar' => ['required', 'numeric'],
            'jumlah_bayar' => ['required']
        ];

        if ($request->tunggakan) {
            $tunggakan = Tunggakan::find($request->tunggakan);
            array_push($rules['bulan_dibayar'], 'max:' . $tunggakan->sisa_bulan);
            array_push($rules['jumlah_bayar'], 'max:' . $tunggakan->sisa_tunggakan);
        }

        $validatedData = $request->validate($rules);

        if ($request->tunggakan) {
            $tunggakan = Tunggakan::find($request->tunggakan);
            $tunggakan->sisa_bulan -= $request->bulan_dibayar;
            $tunggakan->sisa_tunggakan -= $request->jumlah_bayar;
            $tunggakan->save();

            $validatedData['total'] = $tunggakan->total_tunggakan - $request->jumlah_bayar;
            $validatedData['tunggakan_id'] = $request->tunggakan;
            $validatedData['tgl_bayar'] = date('j F Y');
            unset($validatedData['tunggakan']);

            Pembayaran::create($validatedData);
            Notif::create([
                'waktu' => date("Y-m-d H:i:s"),
                'aktivitas' => 'Menambahkan data Entri Pembayaran',
            ]);
            return to_route('pembayaran.index')->with('success', 'Berhasil Menambahakan Data Entri Pembayaran');
        }
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        if ($pembayaran) {
            $pembayaran->delete();
            Notif::create([
                'waktu' => date("Y-m-d H:i:s"),
                'aktivitas' => 'Menghapus data Entri Pembayaran',
            ]);
            return redirect()->route('pembayaran.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
