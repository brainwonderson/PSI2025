<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'umkm_id',  
        'jenis_layanan',
        'isi_layanan',
        'tanggal_layanan',
        'petugas_layanan',
        'zoom',
        'no_telpon',
        'status',
    ];

    
    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
