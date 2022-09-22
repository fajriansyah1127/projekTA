<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = "stoks";
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = ["id","nama_barang", "jenis_barang","jumlah","satuan_id"];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function peminjambarang()
    {
        return $this->hasMany(PeminjamBarang::class);
    }
}
