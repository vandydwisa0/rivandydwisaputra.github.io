<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $guarded = ['id'];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }

    // Accessor untuk format tanggal dibuat
    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->whereHas('siswa', function ($query) use ($cari) {
                $query->where('nama', 'like', '%' . $cari . '%')->orWhere('nisn', 'like', '%' . $cari . '%');
            });
        });
    }

}
