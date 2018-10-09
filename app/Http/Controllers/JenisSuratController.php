<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\JenisSurat;

class JenisSuratController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = JenisSurat::where('deleted_at', NULL)->get();
        return view('template.jenis_surat.index', compact('data'));
    }

    public function jenis_surat_add(){
    	return view('template.jenis_surat.jenis_surat_add');
    }

    public function jenis_surat_store(Request $request){
        $this->validate($request, [
            'nama_jenis_surat' => 'required|unique:jenis_surat,nama_jenis_surat'
        ]);

        JenisSurat::create([
            'nama_jenis_surat' => $request->nama_jenis_surat,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('jenis_surat')->with('messsage', 'Tambah jenis surat baru berhasil!');
    }

    public function jenis_surat_edit($id){
    	$data = JenisSurat::where('id', $id)->first();
    	return view('template.jenis_surat.jenis_surat_update', compact('data'));
    }

    public function jenis_surat_update($id, Request $request){
        $this->validate($request, [
            'nama_jenis_surat' => $request->nama_jenis_surat == $request->nama_jenis_surat_old ? 'required' : 'required|unique:jenis_surat,nama_jenis_surat'
        ]);

      JenisSurat::findOrFail($id)->update([
            'nama_jenis_surat' => $request->nama_jenis_surat,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('jenis_surat')->with('messsage', 'Ubah data jenis surat berhasil!');
    }

    public function jenis_surat_delete($id){
        JenisSurat::findOrFail($id)->delete();
        return redirect('jenis_surat')->with('messsage', 'Hapus data jenis surat berhasil!');
    }
}
