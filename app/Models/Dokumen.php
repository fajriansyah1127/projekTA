<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = "dokumens";
    
    protected $fillable = ["produk_id","outlet_id", "user_id", "nama","nomor_akad","tanggal_klaim","file"];
    protected $guarded =['id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class);
    }
}

