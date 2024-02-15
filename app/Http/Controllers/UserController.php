<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $mobils = Mobil::all();
        return view('dashboard', compact('mobils'));
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
    public function sewa(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);


        $sewa = new Sewa();
        $sewa->id_user = Auth::user()->id;
        $sewa->tanggal_mulai = $request->tanggal_mulai;
        $sewa->tanggal_selesai = $request->tanggal_selesai;
        $sewa->id_mobil = $request->id_mobil;
        $sewa->harga_sewa = $request->tarif_sewa;
        $sewa->save();

        return redirect()->route('user.homepage');
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
    public function destroy(string $id)
    {
        //
    }
}
