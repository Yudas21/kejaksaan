<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KlasifikasiSurat extends Model
{
    use SoftDeletes;
    protected $table = 'klasifikasi_surat';

    protected $fillable = [
        'nama_klasifikasi_surat'
    ];

    protected $dates = ['deleted_at'];
}
