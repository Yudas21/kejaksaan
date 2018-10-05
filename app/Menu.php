<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $table = 'menu';

    protected $fillable = [
        'nama_menu','url','icon','parent'
    ];
    protected $dates = ['deleted_at'];
}																																				
																																																																																																																	