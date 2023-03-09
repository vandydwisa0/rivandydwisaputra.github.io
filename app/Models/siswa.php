<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'password',
        'kelas_id',
        'no_telp',
        'alamat',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }


    public function scopeFilter($query,array $filters)
    {
        $query->when($filters['cari'] ?? false,function($query,$cari){
            return $query->when(function($query) use ($cari){
                $query->where('nisn','like','%'. $cari . '%')->orWhere('nama','like','%'.$cari.'%');
            });
        });
    }
}
