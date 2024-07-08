<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\JenisLapang;
use App\Models\Lapang;
use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    public function index() {
        $dataLapang = Lapang::with(['jadwal' => function($query) {
            $query->latest();
        }])->get();

        return view('page.user.sewa', [
            'dataLapang'      =>$dataLapang
        ]);
    }

    public function create($id) {
        return view('page.user.inputSewa', [
            'userLogin'     =>User::where('id', auth()->user()->id)->first(),
            'jenisSewa'   =>Lapang::where('id', $id)->first(),
            'jenisLapangs'   =>JenisLapang::where('lapang_id', $id)->get(),
            'jadwalSewa'    =>Jadwal::where('jenissewa_id', $id)->latest()->first(),

            // mengecek status penyewaan user
            'cekSewa'       =>Penyewaan::where('user_id', auth()->user()->id)
                                       ->where('status', 'aktif')
                                       ->first()
        ]);
    }

    public function store(Request $request) {
        // dd(request()->all());
        $validateData = $request->validate([
            'user_id'           => 'required',
            'jenislapang_id'    => 'required',
            'jadwal_id'         => 'required',
            'status'            => 'required'
        ]);
        $validateData['status'] = 'aktif';

        //mengecek apakah lapang sedang aktif/dibooking
        $id = $request->input('jenislapang_id');
        $cekLapang  = Penyewaan::where('jenislapang_id', $id)->where('status', 'aktif')->first();
        if ($cekLapang ) {
            return back()->with('warning', '');
        }

        Penyewaan::create($validateData);

        return redirect('/riwayat')->with('sewa', '');
    }
}
