<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "satuans";
    protected $fillable = ["nama", "jenis", "detail"];
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}
