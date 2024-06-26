<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Mahasiswa;
use App\Models\Registrasi;

class SuratRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'surat_rekomendasi'; 
    protected $fillable = [
        'nim_mhs', 
        'nama_mhs',
        'is_rekomendasi'
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

}
