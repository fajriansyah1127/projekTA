<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPeminjam extends Model
{
    use HasFactory;
    protected $table = "dokumens";
    
    protected $fillable = ["produk_id","outlet_id", "user_id", "nama","nomor_akad","tanggal_klaim","file"];
    protected $guarded =['id'];
    // protected function id(): Attribute
    // {
    //     return  Attribute::make(
    //         get: fn ($value) => Hashids::encode($value)
    //     );
    // }

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class);
    }
}
