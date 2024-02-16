<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pengembalian;
use App\Models\Sewa;
use Carbon\Carbon;
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
        return view('user.dashboard', compact('mobils'));
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
        if ($request->status == 'disewa') {
            return redirect()->back();
        }
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $tglAwal = $request->tanggal_mulai;
        $tglAkhir = $request->tanggal_selesai;
        $startCarbon = Carbon::parse($tglAwal);
        $endCarbon = Carbon::parse($tglAkhir);
        $harga_sewa = $request->tarif_sewa * ($endCarbon->diffInDays($startCarbon) + 1);

        $sewa = new Sewa();
        $sewa->id_user = Auth::user()->id;
        $sewa->tanggal_mulai = $request->tanggal_mulai;
        $sewa->tanggal_selesai = $request->tanggal_selesai;
        $sewa->id_mobil = $request->id_mobil;
        $sewa->harga_sewa = $harga_sewa;
        $sewa->save();
        Mobil::where('id', $request->id_mobil)->update(['status' => 'disewa']);

        return redirect()->back();
    }

    public function getHargaSewa(Request $request)
    {
        $tglAwal = $request->tanggal_mulai;
        $tglAkhir = $request->tanggal_selesai;
        $startCarbon = Carbon::parse($tglAwal);
        $endCarbon = Carbon::parse($tglAkhir);

        return $endCarbon->diffInDays($request->tarif_sewa * $startCarbon);
    }

    public function sewaBerlangsung()
    {
        $sewas = Sewa::join('mobils', 'sewas.id_mobil', '=', 'mobils.id')
            ->where('id_user', Auth::user()->id)
            ->where('status', 'disewa')
            ->get(['sewas.*', 'mobils.merek', 'mobils.plat', 'mobils.status']);

        return view('user.riwayat', compact('sewas'));
    }


    public function pengembalian(Request $request)
    {
        $sewa = Sewa::join('mobils', 'sewas.id_mobil', '=', 'mobils.id')
            ->where('id_user', Auth::user()->id)
            ->where('plat', $request->plat)
            ->first(['sewas.*', 'mobils.plat', 'mobils.status']);

        $mobil = Mobil::find($sewa->id_mobil);

        if ($mobil) {
            $mobil->status = 'tersedia';
            $mobil->save();
            Pengembalian::create(['id_sewa' => $sewa->id]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
