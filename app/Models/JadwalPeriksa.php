<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "jadwal_periksa";
    public function dokter(){
        return $this->belongsTo(Dokter::class,"id_dokter");
    }
}
