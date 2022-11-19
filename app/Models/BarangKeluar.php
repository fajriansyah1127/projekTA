<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = "barang_keluar";
    protected $fillable = ["nama","jenis","total_barangkeluar","satuan","pengambil","tanggal_keluar","stok_id","foto"];
    protected $guarded =['id'];
   


    public function stok()
    {
        return $this->belongsTo(Stok::class);
    }
}
