<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

      $credentials = $this->getCredentials($request);

      if(Auth::attempt($credentials)){
               
      } else {
                
        return redirect('')->with('message','Username/password salah!');
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
