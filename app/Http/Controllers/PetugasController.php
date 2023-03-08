<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notif;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Middleware\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all();
        return view('admin.petugass.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('admin.petugass.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'siswa_id' => 'nullable'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Menambahkan data Petugas',
        ]);
        return redirect()->route('petugass.index')->with('success', 'Berhasil Menambahkan Data User');
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
    public function edit(User $petugass)
    {
        return view('admin.petugass.edit', compact('petugass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $petugass)
    {
        $request->validate([
            'siswa_id' => 'nullable',
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'nullable',
            'role' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $petugass->update($request->all());
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Mengedit data Petugas',
        ]);
        return redirect()->route('petugass.index')->with('success', 'Berhasil Mengedit Data User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        if ($petugas) {
            $petugas->delete();
            Notif::create([
                'waktu' => date("Y-m-d H:i:s"),
                'aktivitas' => 'Menghapus data Petugas',
            ]);
            return redirect()->route('petugass.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
