<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Notif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();

        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);
        Kelas::create($request->all());
        Notif::create([
            'user' => Auth::user()->username,
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Menambahkan data Kelas',
        ]);
        return to_route('kelas.index')->with('success', 'Berhasil Menambahkan Data kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);

        $kelas->update($request->all());
        Notif::create([
            'user' => Auth::user()->role == 'Admin',
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Mengedit data Kelas',
        ]);
        return to_route('kelas.index')->with('success', 'Berhasil Mengedit Data Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        if ($kelas) {
            $kelas->delete();
            Notif::create([
                'user' => Auth::user()->username,
                'waktu' => date("Y-m-d H:i:s"),
                'aktivitas' => 'Menghapus data Kelas',
            ]);
            return redirect()->route('kelas.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
