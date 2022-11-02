<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeminjamBarang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "peminjam_barangs";
    protected $dates = ['deleted_at'];
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = ["id","nama_peminjam", "stok_id","tanggal_pinjam","keperluan"];

    public function stok()
    {
        return $this->belongsTo(Stok::class);
    }
}
