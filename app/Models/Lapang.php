<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenisLapang() {
        return $this->hasMany(JenisLapang::class,'lapang_id', 'id');
    }

    public function jadwal() {
        return $this->hasMany(Jadwal::class,'jenissewa_id', 'id');
    }
}
