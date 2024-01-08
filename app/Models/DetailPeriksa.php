<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "detail_periksa";

    public function obat(){
        return $this->belongsTo(Obat::class,'id_obat');
    }
}
