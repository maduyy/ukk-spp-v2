<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Notif;
use App\Models\Siswa;
use App\Models\Tunggakan;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tunggakan = Tunggakan::all();
        return view('admin.tunggakan.index', compact('tunggakan'));
    }

    public function petugas()
    {
        $tunggakan = Tunggakan::all();
        return view('petugas.tunggakan', compact('tunggakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('admin.tunggakan.create', compact('siswa', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => ['required', 'string'],
            'spp_id' => ['required', 'string'],
            'bulan' => ['required', 'string'],
            'total_tunggakan' => ['string'],
        ]);
        $validatedData['sisa_bulan'] = $request->bulan;
        $validatedData['sisa_tunggakan'] = $request->total_tunggakan;
        Tunggakan::create($validatedData);
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Menambahkan data Tunggakan',
        ]);
        return redirect()->route('tunggakan.index')->with('success', 'Berhasil Menambahkan Data Tunggakan Siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tunggakan $tunggakan)
    {
        $siswa = Siswa::all();
        return view('admin.tunggakan.edit', compact('siswa', 'tunggakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tunggakan $tunggakan)
    {
        $validatedData = $request->validate([
            'siswa_id' => ['required', 'string'],
            'bulan' => ['required', 'string'],
            'total_tunggakan' => ['required', 'string'],
        ]);
        $validatedData['sisa_bulan'] = $request->bulan;
        $validatedData['sisa_tunggakan'] = $request->total_tunggakan;

        $tunggakan->update($validatedData);
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Mengedit data Tunggakan',
        ]);
        return redirect()->route('tunggakan.index')->with('success', 'Berhasil Mengedit Data Tunggakan Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tunggakan = Tunggakan::findOrFail($id);
        if ($tunggakan) {
            $tunggakan->delete();
            Notif::create([
                'waktu' => date("Y-m-d H:i:s"),
                'aktivitas' => 'Menghapus data Tunggakan',
            ]);
            return redirect()->route('tunggakan.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
