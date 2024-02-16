<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pengembalian;
use App\Models\Sewa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobils = Mobil::all();
        return view('admin.dashboard', compact('mobils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambahMobil()
    {
        return view('admin.tambah-mobil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function kirimDataMobil(Request $request)
    {

        $validated = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'plat' => 'required',
            'tarif_sewa' => 'required', 'numeric',
            'status' => 'tersedia',
        ]);

        $mobil = new Mobil();
        $mobil->fill($validated);
        $mobil->save();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function penyewaan()
    {
        $sewas = Sewa::join('mobils', 'sewas.id_mobil', '=', 'mobils.id')
            ->join('users', 'sewas.id_user', '=', 'users.id')
            ->select('sewas.*', 'mobils.*', 'users.*')
            ->where('status', 'disewa')
            ->get();

        return view('admin.penyewaan', compact('sewas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pengembalian()
    {
        $pengembalians = Pengembalian::join('sewas', 'pengembalians.id_sewa', '=', 'sewas.id')
            ->join('users', 'sewas.id_user', '=', 'users.id')
            ->join('mobils', 'sewas.id_mobil', '=', 'mobils.id')
            ->get(['pengembalians.*', 'sewas.*', 'users.*', 'mobils.*']);

        return view('admin.pengembalian', compact('pengembalians'));
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
