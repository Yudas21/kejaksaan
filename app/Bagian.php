<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bagian extends Model
{
    use SoftDeletes;
    protected $table = 'bagian';

    protected $fillable = [
        'nama_bagian', 'parent'
    ];

    protected $dates = ['deleted_at'];
}
