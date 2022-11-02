<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulir extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "formulirs";
    protected $guarded =['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama','file'];
}
