<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    public $timestamps = false;
    protected $fillable = [
        'nama_kelas',
        'kompetensi_keahlian',
        'singkatan',
        'created'
    ];

    // Accessor untuk format tanggal dibuat
    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->when(function ($query) use ($cari) {
                $query->where('nama_kelas', 'like', '%' . $cari . '%')->orWhere('singkatan', 'like', '%' . $cari . '%');
            });
        });
    }
}
