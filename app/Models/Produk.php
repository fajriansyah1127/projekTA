<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "produks";
    
    protected $fillable = ["nama", "asuransi_id"];
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function asuransi()
    {
        return $this->belongsTo(Asuransi::class);
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }
}
