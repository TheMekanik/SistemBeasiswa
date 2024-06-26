<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = "mahasiswa";
    protected $primaryKey = "nim";
    protected $keyType = 'string'; 
    public $incrementing = false;
    protected $fillable = [
        'name',
        'nim', 
        'prodi', 
        'angkatan',
        'ttl', 
        'level',
        'email',
        'password',
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rekomendasi(): HasOne
    {
        return $this->hasOne(SuratRekomendasi::class);
    }

    public function dokumen(): HasOne
    {
        return $this->hasOne(Dokumen::class);
    }

    public function regitrasi(): HasMany
    {
        return $this->hasMany(Registrasi::class);
    }
}
