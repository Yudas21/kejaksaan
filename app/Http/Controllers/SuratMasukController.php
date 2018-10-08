<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratMasukController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function scanning(){
        return view('template.surat_masuk.scanning');
    }

    public function agenda(){
        return view('template.surat_masuk.agenda_surat');
    }

    public function disposisi(){
        return view('template.surat_masuk.disposisi');
    }
}
