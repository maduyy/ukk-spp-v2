<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Notif;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::all();
        return view('admin.spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);
        Spp::create($request->all());
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Menambahkan data Spp',
        ]);
        return to_route('spp.index')->with('success', 'Berhasil Menambahkan Data Spp');
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
    public function edit(Spp $spp)
    {
        return view('admin.spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spp $spp)
    {
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);
        $spp->update($request->all());
        Notif::create([
            'waktu' => date("Y-m-d H:i:s"),
            'aktivitas' => 'Mengedit data Spp',
        ]);
        return to_route('spp.index')->with('success', 'Berhasil Mengedit Data Spp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        if ($spp) {
            $spp->delete();
            Notif::create([
                'waktu' => date("Y-m-d H:i:s"),
                'aktivitas' => 'Menghapus data Spp',
            ]);
            return redirect()->route('spp.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
