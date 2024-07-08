<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalSewaController extends Controller
{
    public function index() {
        return view('page.user.jadwalsewa',[
            'dataJadwal'    =>Jadwal::all()
        ]);
    }
}
