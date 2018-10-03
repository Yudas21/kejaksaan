<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function index(){
      return view('template.login');
    }

    public function checkLogin(Request $request){
      $this->validate($request, [
           'username' => 'required',
           'password' => 'required'
      ]);

      // $credentials = Self::getCredentials($request);
      if($request->username !='' && $request->password !=''){
      	   
      } else {
      	return redirect('')->with('message','Username atau Password tidak boleh kosong');
      }
      
    }

    public function forgotPassword(){
      return view('template.forgot');
    }

    protected function getCredentials(Request $request)
    {
      return $request->only('username', 'password');
    }
}
