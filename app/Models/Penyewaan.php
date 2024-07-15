<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detailPenyewaan() {
        return $this->belongsTo(DetailPenyewaan::class,'detail_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function jenisLapang() {
        return $this->belongsTo(JenisLapang::class,'jenislapang_id', 'id');
    }

    public function jadwal() {
        return $this->belongsTo(Jadwal::class,'jadwal_id', 'id');
    }
}
