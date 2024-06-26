<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = "registrasi";
    protected $fillable = [
        'beasiswa_id', 
        'nama_beasiswa',
        'nim_mhs', 
        'status', 
        'nama_mhs', 
        'image_cv', 
        'image_transkrip'
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function beasiswa(): BelongsTo
    {
        return $this->belongsTo(Beasiswa::class);
    }
}
