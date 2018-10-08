<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupportingController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function kalender(){
    	return view('template.supporting.kalender');
    }

    public function email(){
    	return view('template.supporting.email');
    }
}
