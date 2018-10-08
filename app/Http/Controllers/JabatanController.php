<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jabatan;

class JabatanController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = Jabatan::where('deleted_at', NULL)->get();
        return view('template.jabatan.index', compact('data'));
    }

    public function jabatan_add(){
    	return view('template.jabatan.jabatan_add');
    }

    public function jabatan_store(Request $request){
        $this->validate($request, [
            'nama_jabatan' => 'required|unique:jabatan,nama_jabatan'
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('jabatan')->with('messsage', 'Tambah user baru berhasil!');
    }

    public function jabatan_edit($id){
    	$data = Jabatan::where('id', $id)->first();
    	return view('template.jabatan.jabatan_update', compact('data'));
    }

    public function jabatan_update($id, Request $request){
        $this->validate($request, [
            'nama_jabatan' => $request->nama_jabatan == $request->nama_jabatan_old ? 'required' : 'required|unique:jabatan,nama_jabatan'
        ]);

      Jabatan::findOrFail($id)->update([
            'nama_jabatan' => $request->nama_jabatan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('jabatan')->with('messsage', 'Ubah data user berhasil!');
    }

    public function jabatan_delete($id){
        Jabatan::findOrFail($id)->delete();
        return redirect('jabatan')->with('messsage', 'Hapus data jabatan berhasil!');
    }
}
