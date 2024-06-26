<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Mitra;
use App\Models\Registrasi;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Beasiswa extends Model
{
    use HasFactory;
    
    protected $table = "beasiswa";
    protected $fillable = [
        'namaBeasiswa', 
        'mitra_id',
        'deskripsiBeasiswa',
        'linkPendaftaran', 
        'oprecStart', 
        'oprecEnd', 
        'image' 
    ];
    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class);
    }

    public function regitrasi(): HasMany
    {
        return $this->hasMany(Registrasi::class);
    }

}