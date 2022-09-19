<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = "barang_masuk";
    protected $fillable = ["nama","jenis","total_barangmasuk","satuan","penerima","foto","tanggal_masuk","stok_id"];
    protected $guarded =['id'];


    public function stok()
    {
        return $this->belongsTo(Stok::class);
    }

}
