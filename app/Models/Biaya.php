<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
     protected $fillable = [
        'tanggal',
        'kategori',
        'keterangan',
        'jumlah',
    ];
}
