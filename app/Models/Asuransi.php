<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    use HasFactory;

    protected $table = "Asuransis";

    protected $fillable = ["nama", "email", "kontak","alamat","status"];
    protected $guarded = ['id'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }

}
 