<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Indras;
use App\User;


class AdminController extends Controller
{

	public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return $this->dasboard();
    }

    public function dasboard(){
    	return view('template.dashboard');
    }

    public function profile(){
        $profile = User::where('id_user', session('userid'))->first();
        return view('template.profile', compact('profile'));
    }

    public function profile_update($id, Request $request){
        $this->validate($request, [
            'nama_lengkap' => 'required|string',
            'tgl_lahir' => 'date'
        ]);

        User::where('id_user', $id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir != '' ? $request->tgl_lahir : '',
            'tempat_lahir' => $request->tempat_lahir != '' ? $request->tempat_lahir : '',
            'handphone' => $request->handphone != '' ? $request->handphone : '',
            'alamat' => $request->alamat != '' ? $request->alamat : '',
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        session(['nama' => $request->nama_lengkap]);

        return redirect('admin/profile')->with('message', 'Update profil berhasil!');
    }

    public function password_update($id, Request $request){
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|string|min:5',
            'confirm_password' => 'required|same:password'
        ]);

        if($request->current_password != session('password')) {
           return redirect()->back()->with('error','Password sekarang salah. Silakan coba lagi!');
        }

       if($request->password == $request->current_password) {
           return redirect()->back()->with('error','Password baru sama seperti password sekarang. Silakan coba lagi dengan password yang berbeda.');
        } 

        User::where('id_user', $id)->update([
                'password' => Hash::make($request->password),
                'updated_at' => date('Y-m-d H:i:s')
        ]);

        session(['password' => $request->password]);

        return redirect('admin/profile')->with('message', 'Password berhasil diubah!');
    }

    public function change_photo(Request $request){
        $id = session('userid');
        $this->validate($request, [
            'photo' => 'required|file|max:2000'
        ]);

        $uploadedFile = $request->file('photo'); 
        $path = $uploadedFile->store('public/photo');
        $pecah = explode('/', $path);

        if($request->fotolama != '' || $request->fotolama != NULL){
            unlink(storage_path('app/public/photo/'.$request->fotolama));
        }
        
        User::where('id_user', $id)->update([
            'photo' => trim($pecah[2]),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/profile')->with('message', 'Foto berhasil diganti!');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
