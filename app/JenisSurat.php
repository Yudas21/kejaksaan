<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisSurat extends Model
{
    use SoftDeletes;
    protected $table = 'jenis_surat';

    protected $fillable = [
        'nama_jenis_surat'
    ];
    protected $dates = ['deleted_at'];
}
