<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class DataPenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $penyewaan = [];

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Ambil data penyewaan yang berelasi dengan lapang sesuai dengan rentang tanggal
            $penyewaan = Penyewaan::whereHas('detailPenyewaan', function($query) use ($startDate, $endDate) {
                $query->whereBetween('mulai_sewa', [$startDate, $endDate]);
            })->get();
        } else {
            // Ambil semua data penyewaan jika tidak ada filter tanggal
            $penyewaan = Penyewaan::with('detailPenyewaan')->get();
        }

        return view('page.admin.datapenyewaan.index', [
            // 'dataPenyewaan'     =>Penyewaan::all(),
            'dataPenyewaan'         =>$penyewaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Ambil data penyewaan yang berelasi dengan lapang sesuai dengan rentang tanggal
        $penyewaan = Penyewaan::whereHas('jadwal', function($query) use ($startDate, $endDate) {
            $query->whereBetween('mulai_sewa', [$startDate, $endDate]);
        })->get();

        // Tampilkan data yang difilter di halaman cetak
        return view('page.admin.datapenyewaan.print', compact('penyewaan', 'startDate', 'endDate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $validateData = $request->validate([
            'status'    => 'required'
        ]);
        Penyewaan::find($id)->update($validateData);
        return back()->with('update', '');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penyewaan::find($id)->delete();
        return back()->with('delete', '');    
    }
}
