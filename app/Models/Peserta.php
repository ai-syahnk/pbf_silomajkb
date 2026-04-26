<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = [
        'user_id',
        'nim',
        'telepon',
        'prodi',
        'portofolio_path',
        'ktm_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kompetisi()
    {
        return $this->belongsToMany(Kompetisi::class, 'kompetisi_peserta', 'peserta_id', 'kompetisi_id')
            ->withTimestamps();
    }
}
