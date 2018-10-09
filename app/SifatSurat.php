<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SifatSurat extends Model
{
    use SoftDeletes;
    protected $table = 'sifat_surat';

    protected $fillable = [
        'nama_sifat_surat'
    ];

    protected $dates = ['deleted_at'];
}
