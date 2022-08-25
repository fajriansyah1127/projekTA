<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";

    protected $fillable = ["nama", "asuransi_id","user_id"];
    protected $guarded = ['id'];

    public function asuransi()
    {
        return $this->belongsTo(Asuransi::class);
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }
}
