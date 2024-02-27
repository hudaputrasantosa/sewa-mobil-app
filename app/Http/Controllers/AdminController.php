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
            'tarif_sewa' => 'required|numeric|between:0,9999999999.99',
        ]);
        $validated['tarif_sewa'] = preg_replace("/[.,]/", "", $validated['tarif_sewa']);
        $mobil = new Mobil();

        $mobil->status = "tersedia";
        $mobil->fill(
            $validated
        );
        $mobil->save();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function penyewaan()
    {
        $sewas = Sewa::join('mobils', 'sewas.mobils_id', '=', 'mobils.id')
            ->join('users', 'sewas.users_id', '=', 'users.id')
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
            ->join('users', 'sewas.users_id', '=', 'users.id')
            ->join('mobils', 'sewas.mobils_id', '=', 'mobils.id')
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
