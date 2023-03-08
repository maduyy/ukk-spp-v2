<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Notif;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();

        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.create', compact('kelas', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => ['required'],
            'spp_id' => ['required'],
            'nis' => ['required'],
            'nisn' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
        ]);
        Siswa::create($request->all());
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Menambahkan data Siswa',
        ]);
        return to_route('siswa.index')->with('success', 'Berhasil Menambahkan Data Siswa');
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
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.edit', compact('kelas', 'spp', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'kelas_id' => ['required'],
            'spp_id' => ['required'],
            'nis' => ['required'],
            'nisn' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
        ]);
        $siswa->update($request->all());
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Mengedit data Siswa',
        ]);
        return to_route('siswa.index')->with('success', 'Berhasil Mengedit Data Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa) {
            $siswa->delete();
            Notif::create([
                'waktu' => date("Y-m-d H:i:s"),
                'aktivitas' => 'Menghapus data Siswa',
            ]);
            return redirect()->route('siswa.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
