<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $user = Auth::attempt($data);
        if (!$user) {
            return redirect()->back()->with('loginError', 'Username atau password salah..!!');
        }

        if (Auth::user()->role == 'Admin') {
            return redirect()->intended('/admin')->with('success', 'Welkam admin');
        } elseif (Auth::user()->role == 'Petugas') {
            return redirect()->intended('/petugas')->with('success', 'Welkam petugas');
        } else {
            return redirect()->route('siswas.index')->with('success', 'Welkam siswa');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Logout berhasil');
    }
}
