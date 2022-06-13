<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $fillable = ["asuransi_id", "user_id", "nama","nomor_surat","produk","tanggal_surat","file"];
    protected $guarded =['id'];

    public function asuransi()
    {
        return $this->belongsTo(Asuransi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

