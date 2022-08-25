<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = "outlets";
    protected $fillable = ["nama"];
    protected $guarded =['id'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }
}
