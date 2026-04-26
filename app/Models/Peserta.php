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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
