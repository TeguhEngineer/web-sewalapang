<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Penyewaan::where('user_id', auth()->user()->id);
        return view('page.user.riwayat', [
            'riwayat' => $riwayat->get(),
            // 'batal' => $riwayat->first(),
        ]);
    }

    public function uploadBuktiPembayaran(Request $request, $id)
    {
        $files = $request->file('image');

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasfile('image')) {
            $name = hexdec(uniqid());
            $extension = strtolower($files->getClientOriginalExtension());
            $filenamesimpan = $name . '.' . $extension;
            $files->move('bukti_transaksi', $filenamesimpan);
            Penyewaan::find($id)->update([
                'bukti_transaksi' => $filenamesimpan,
            ]);
        }
        return back()->with('upload', '');
    }

    public function delete(string $id) {
        // dd(request()->all());
        Penyewaan::find($id)->delete();
        return back()->with('batal', '');
    }
}
