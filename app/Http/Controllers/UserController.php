<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pengembalian;
use App\Models\Sewa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        return view('user.dashboard');
    }

    public function getData()
    {

        $mobils = Mobil::query();
        // @dd($mobils);
        return DataTables::of($mobils)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-modal-target="detail-' . $row->id . '"
                data-modal-toggle="detail-' . $row->id . '"
                data-id="' . $row->id . '" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 lihat-detail">Ajukan sewa</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function tampilSewa(string $id_mobil)
    {
        $mobil = Mobil::find($id_mobil);
        return view('user.sewa', compact('mobil'));
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
        $sewa->users_id = Auth::user()->id;
        $sewa->tanggal_mulai = $request->tanggal_mulai;
        $sewa->tanggal_selesai = $request->tanggal_selesai;
        $sewa->mobils_id = $request->id_mobil;
        $sewa->harga_sewa = $harga_sewa;
        $sewa->save();
        Mobil::where('id', $request->id_mobil)->update(['status' => 'disewa']);

        return redirect()->route('user.sewa.berlangsung');
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
        $sewas = Sewa::join('mobils', 'sewas.mobils_id', '=', 'mobils.id')
            ->where('users_id', Auth::user()->id)
            ->where('status', 'disewa')
            ->get(['sewas.*', 'mobils.merek', 'mobils.plat', 'mobils.status']);

        return view('user.riwayat', compact('sewas'));
    }


    public function pengembalian(Request $request)
    {
        $sewa = Sewa::join('mobils', 'sewas.mobils_id', '=', 'mobils.id')
            ->where('users_id', Auth::user()->id)
            ->where('plat', $request->plat)
            ->first(['sewas.*', 'mobils.plat', 'mobils.status']);

        if (!$sewa) {
            return redirect()->back();
        } else {
            $mobil = Mobil::find($sewa->id_mobil);
            $mobil->status = 'tersedia';
            $mobil->save();
            Pengembalian::create(['id_sewa' => $sewa->id]);
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
