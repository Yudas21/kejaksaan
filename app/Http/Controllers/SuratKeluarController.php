<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use QRCode;

class SuratKeluarController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function agenda(){
        return view('template.surat_keluar.agenda_surat');
    }
}
