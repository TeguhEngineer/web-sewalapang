<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLapang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function penyewaan() {
        return $this->hasMany(Penyewaan::class,'jenislapang_id', 'id');
    }

    public function lapang() {
        return $this->belongsTo(Lapang::class,'lapang_id', 'id');
    }
}
