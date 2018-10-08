<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $table = 'akses';

    protected $fillable = [
        'id_menu','id_level'
    ];
}
