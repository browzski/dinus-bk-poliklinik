<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPoliklinik extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "daftar_poli";

    public function pasien(){
        return $this->belongsTo(Pasien::class,"id_pasien");
    }
    public function jadwal(){
        return $this->belongsTo(JadwalPeriksa::class,'id_jadwal');
    }
    public function detail(){
        return $this->hasMany(DetailPeriksa::class,'id_periksa');
    }
    public function periksa(){
        return $this->hasOne(Periksa::class,'id_daftar_poli');
    }
}
