<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function penyewaan() {
    //     return $this->belongsTo(Penyewaan::class,'penyewaan_id', 'id');
    // }
}
