<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $table = "peminjams";
    protected $fillable = ["nama","dokumen_id","tanggal"];
    protected $guarded =['id'];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }
}
