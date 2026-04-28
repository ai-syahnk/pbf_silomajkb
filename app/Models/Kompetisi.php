<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetisi extends Model
{
    use HasFactory;

    protected $table = 'kompetisi';

    protected $fillable = [
        'nama',
        'periode_pendaftaran',
        'deskripsi',
        'syarat_ketentuan',
        'gambar',
    ];

    public function peserta()
    {
        return $this->belongsToMany(Peserta::class, 'kompetisi_peserta', 'kompetisi_id', 'peserta_id')
            ->withPivot(['kategori', 'nama_tim', 'anggota'])
            ->withTimestamps();
    }
}
