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

      $credentials = $this->getCredentials($request);

      if(Auth::attempt($credentials)){
             $data = User::where('username', $request->username)->where('aktif', '1')->limit(1)->first();
             if(User::where('username', $request->username)->where('aktif', '1')->count() > 0){
                $session = array(
                                  'userid' => $data->id,
                                  'id_level' => $data->id_level,
                                  'nama' => $data->nama_lengkap,
                                  'username' => $data->username,
                                  'email' => $data->email,
                                  'password' => $request->password
                );
                Session($session);
                return redirect('admin/dashboard');
             } else {
                return redirect('')->with('message','Akun anda tidak aktif, silakan untuk menghubungi administrator!');      
             }

      } else {
                
        return redirect('')->with('message','Username atau Password salah!');
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
