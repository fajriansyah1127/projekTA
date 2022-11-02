<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumenPeminjam extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "dokumens";
    
    protected $fillable = ["produk_id","outlet_id", "user_id", "nama","nomor_akad","tanggal_klaim","file"];
    protected $guarded =['id'];
    protected $dates = ['deleted_at'];
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
