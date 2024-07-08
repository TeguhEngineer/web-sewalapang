<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function penyewaan() {
        return $this->hasMany(Penyewaan::class,'jadwal_id', 'id');
    }

    public function lapang() {
        return $this->belongsTo(Lapang::class,'jenissewa_id', 'id');
    }
}
