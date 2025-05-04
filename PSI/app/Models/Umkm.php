<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'nama',
        'email',
        'jenis_kelamin',
        'tanggal',
        'negara',
        'instansi',
        'provinsi',
        'jenis_perusahaan',
        'kota',
        'alamat',
        'no_fax',
        'status',
    ];
}
