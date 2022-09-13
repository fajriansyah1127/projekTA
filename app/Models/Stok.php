<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = "stoks";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ["kode_barang", "nama_barang", "jenis_barang","jumlah","satuan"];
    protected $guarded = ['id'];
}
