<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Riwayat extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "riwayats";
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id','nama', 'aktivitas','created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
           ->format('d, M Y H:i');
    }
    
}
