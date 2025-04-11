<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat',
        'email',
        'negara',
        'provinsi',
        'kota',
        'no_telp',
        'no_fax',
        'pekerjaan',
        'usia',
        'layanan',
        'tanggal',
        'petugas',
        'status',
        'survey'
    ];
}
