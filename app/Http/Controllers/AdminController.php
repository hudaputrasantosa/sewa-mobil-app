<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobils = Mobil::latest()->get();
        // $sewam = $mobils->sewa;
        // @dd($sewam);
        return view('admin.dashboard', compact('mobils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambahMobil()
    {
        return view('admin.tambahMobil');
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
        ]);

        $mobil = new Mobil();
        $mobil->fill($validated);
        $mobil->save();

        return redirect()->route('admin.dashboard');
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
