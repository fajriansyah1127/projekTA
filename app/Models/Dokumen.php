<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Dokumen extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "dokumens";
    
    protected $fillable = ["produk_id","outlet_id", "user_id","nama_pengupload", "nama","nomor_akad","tanggal_klaim","file"];
    protected $guarded =['id'];
    protected $dates = ['deleted_at'];
    protected function id(): Attribute
    {
        return  Attribute::make(
            get: fn ($value) => Hashids::encode($value)
        );
    }

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

