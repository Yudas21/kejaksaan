<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\SifatSurat;

class SifatSuratController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = SifatSurat::where('deleted_at', NULL)->get();
        return view('template.sifat_surat.index', compact('data'));
    }

    public function sifat_surat_add(){
    	return view('template.sifat_surat.sifat_surat_add');
    }

    public function sifat_surat_store(Request $request){
        $this->validate($request, [
            'nama_sifat_surat' => 'required|unique:sifat_surat,nama_sifat_surat'
        ]);

        SifatSurat::create([
            'nama_sifat_surat' => $request->nama_sifat_surat,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('sifat_surat')->with('messsage', 'Tambah sifat surat baru berhasil!');
    }

    public function sifat_surat_edit($id){
    	$data = SifatSurat::where('id', $id)->first();
    	return view('template.sifat_surat.sifat_surat_update', compact('data'));
    }

    public function sifat_surat_update($id, Request $request){
        $this->validate($request, [
            'nama_sifat_surat' => $request->nama_sifat_surat == $request->nama_sifat_surat_old ? 'required' : 'required|unique:sifat_surat,nama_sifat_surat'
        ]);

      SifatSurat::findOrFail($id)->update([
            'nama_sifat_surat' => $request->nama_sifat_surat,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('sifat_surat')->with('messsage', 'Ubah data sifat surat berhasil!');
    }

    public function sifat_surat_delete($id){
        SifatSurat::findOrFail($id)->delete();
        return redirect('sifat_surat')->with('messsage', 'Hapus data sifat surat berhasil!');
    }
}
