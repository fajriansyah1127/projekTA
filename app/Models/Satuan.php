<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $table = "satuans";
    protected $fillable = ["nama", "jenis", "detail"];
    protected $guarded = ['id'];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}
