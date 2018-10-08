<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Level;
use App\Jabatan;
use App\Bagian;


class UserController extends Controller
{

	public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = DB::table('users as a')->select('a.id', 'a.nama_lengkap','b.nama_bagian','c.nama_jabatan','d.nama_level','a.aktif')->leftJoin('bagian as b','b.id','=','a.id_bagian')->leftJoin('jabatan as c','c.id','=','a.id_jabatan')->leftJoin('level as d', 'd.id','=','a.id_level')->where('a.deleted_at', NULL)->get();
        return view('template.user.index', compact('data'));
    }

    public function users_add(){
    	$bagian = Bagian::all(); 
    	$jabatan = Jabatan::all();
    	$level = Level::all();
    	return view('template.user.users_add', compact('bagian','jabatan','level'));
    }

    public function users_store(Request $request){
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5',
            'id_level' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'handphone' => $request->handphone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_bagian' => $request->id_bagian,
            'id_jabatan' => $request->id_jabatan,
            'id_level' => $request->id_level,
            'aktif' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('users')->with('message', 'Tambah user baru berhasil!');
    }

    public function users_edit($id){
    	$bagian = Bagian::all(); 
    	$jabatan = Jabatan::all();
    	$level = Level::all();
    	$data = User::where('id', $id)->first();
    	return view('template.user.users_update', compact('bagian','jabatan','level','data'));
    }

    public function users_update($id, Request $request){
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => $request->username == $request->username_old ? 'required' : 'required|unique:users,username',
            'email' => $request->email == $request->email_old ? 'required' : 'required|unique:users,email',
            'id_level' => 'required',
            'aktif' => 'required'
        ]);

      User::findOrFail($id)->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'handphone' => $request->handphone,
            'email' => $request->email,
            'id_bagian' => $request->id_bagian,
            'id_jabatan' => $request->id_jabatan,
            'id_level' => $request->id_level,
            'aktif' => $request->aktif,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('users')->with('message', 'Ubah data user berhasil!');
    }

    public function users_edit_password($id){
    	return view('template.user.users_update_password', compact('id'));
    }

    public function users_update_password($id, Request $request){
        
        $this->validate($request, [
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5'
        ]);

        User::findOrFail($id)->update([
            'password' => Hash::make($request->password),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('users')->with('message', 'Ubah password user berhasil!');
    }

    public function users_delete($id){
        User::findOrFail($id)->delete();
        return redirect('users')->with('message', 'Ubah password user berhasil!');
    }
}
