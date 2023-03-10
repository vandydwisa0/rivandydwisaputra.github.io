<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\SppObserver;

class spp extends Model
{
    use HasFactory;

    protected $table = 'spp';
    public $timestamps= false;
    protected $fillable = [
        'tahun',
        'nominal',
        'nominal_perbulan',
        'created'
    ];
    // Accessor untuk format tanggal dibuat
    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class, 'spp_id');
    }
}

