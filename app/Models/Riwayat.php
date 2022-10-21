<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Riwayat extends Model
{
    use HasFactory;


    protected $table = "riwayats";

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
