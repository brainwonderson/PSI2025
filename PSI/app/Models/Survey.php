<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'layanan_id',
        'survey',
        'komentar',
    ];


    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

}
