<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    use HasFactory;

    protected $table = "asuransis";

    protected $fillable = ["nama", "email", "kontak","alamat","status"];
    protected $guarded = ['id'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

}
 