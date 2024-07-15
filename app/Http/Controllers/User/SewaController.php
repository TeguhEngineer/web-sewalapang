<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailPenyewaan;
use App\Models\Jadwal;
use App\Models\JenisLapang;
use App\Models\Lapang;
use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    public function index()
    {
        $dataLapang = Lapang::with([
            'jadwal' => function ($query) {
                $query->latest();
            },
        ])->get();

        // validasi id lapang ketika lapang futsal dipakai
        $valid_id = [1, 2, 3, 5];
        $id = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 17, 18, 19, 20];
        $validasi = Penyewaan::whereIn('jenislapang_id', $id)->where('status', 'aktif')->first();

        return view('page.user.sewa', [
            'dataLapang' => $dataLapang,
            'validasi' => $validasi,
            'id' => $valid_id,
        ]);
    }

    public function create($id)
    {
        return view('page.user.inputSewa', [
            'userLogin' => User::where('id', auth()->user()->id)->first(),
            'jenisSewa' => Lapang::where('id', $id)->first(),
            'jenisLapangs' => JenisLapang::where('lapang_id', $id)->get(),
            'jadwalSewa' => Jadwal::where('jenissewa_id', $id)->latest()->first(),

            // mengecek status penyewaan user
            'cekSewa' => Penyewaan::where('user_id', auth()->user()->id)
                ->where('status', 'pending')
                // ->where('status', 'aktif')
                ->first(),
        ]);
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        $master = DetailPenyewaan::create([
            'kegiatan' => $request->kegiatan,
            'status' => $request->statusewa,
            'mulai_sewa' => $request->mulai_sewa,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'lama_sewa' => $request->lama_sewa,
        ]);

        $validateData = $request->validate([
            'detail_id' => 'nullable',
            'user_id' => 'required',
            'jenislapang_id' => 'required',
            'jadwal_id' => 'required',
            'status' => 'required',
        ]);
        $validateData['detail_id'] = $master->id;
        $validateData['status'] = 'pending';

        //mengecek apakah lapang sedang aktif/dibooking
        $id = $request->input('jenislapang_id');
        $cekLapang = Penyewaan::where('jenislapang_id', $id)->where('status', 'aktif')->first();
        if ($cekLapang) {
            return back()->with('warning', '');
        }

        Penyewaan::create($validateData);

        return redirect('/riwayat')->with('sewa', '');
    }
}
