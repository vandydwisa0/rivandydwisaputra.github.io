<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'kompetensi_keahlian',
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
}
