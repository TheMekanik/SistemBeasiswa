<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = "dokumen";
    protected $fillable = [
        'nim_mhs', 
        'image_cv', 
        'image_transkrip'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
