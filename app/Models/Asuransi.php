<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asuransi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "asuransis";

    protected $fillable = ["nama", "email", "kontak","alamat","status"];
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

}
 