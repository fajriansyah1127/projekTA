<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangMasuk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "barang_masuk";
    protected $fillable = ["nama","jenis","total_barangmasuk","satuan","penerima","foto","tanggal_masuk","stok_id"];
    protected $guarded =['id'];
    protected $dates = ['deleted_at'];


    public function stok()
    {
        return $this->belongsTo(Stok::class);
    }

}
