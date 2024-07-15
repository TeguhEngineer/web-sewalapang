<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenyewaan extends Model
{
    use HasFactory;
    protected $fillable = ['id','kegiatan','status','mulai_sewa','hari','jam','lama_sewa'];

    public function detailPenyewaan() {
        return $this->hasMany(Penyewaan::class,'detail_id', 'id');
    }
}
