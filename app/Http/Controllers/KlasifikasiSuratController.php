<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\KlasifikasiSurat;

class KlasifikasiSuratController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = KlasifikasiSurat::where('deleted_at', NULL)->get();
        return view('template.klasifikasi_surat.index', compact('data'));
    }

    public function klasifikasi_surat_add(){
    	return view('template.klasifikasi_surat.klasifikasi_surat_add');
    }

    public function klasifikasi_surat_store(Request $request){
        $this->validate($request, [
            'nama_klasifikasi_surat' => 'required|unique:klasifikasi_surat,nama_klasifikasi_surat'
        ]);

        KlasifikasiSurat::create([
            'nama_klasifikasi_surat' => $request->nama_klasifikasi_surat,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('klasifikasi_surat')->with('messsage', 'Tambah klasifikasi surat baru berhasil!');
    }

    public function klasifikasi_surat_edit($id){
    	$data = KlasifikasiSurat::where('id', $id)->first();
    	return view('template.klasifikasi_surat.klasifikasi_surat_update', compact('data'));
    }

    public function klasifikasi_surat_update($id, Request $request){
        $this->validate($request, [
            'nama_klasifikasi_surat' => $request->nama_klasifikasi_surat == $request->nama_klasifikasi_surat_old ? 'required' : 'required|unique:klasifikasi_surat,nama_klasifikasi_surat'
        ]);

      KlasifikasiSurat::findOrFail($id)->update([
            'nama_klasifikasi_surat' => $request->nama_klasifikasi_surat,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('klasifikasi_surat')->with('messsage', 'Ubah data klasifikasi surat berhasil!');
    }

    public function klasifikasi_surat_delete($id){
        KlasifikasiSurat::findOrFail($id)->delete();
        return redirect('klasifikasi_surat')->with('messsage', 'Hapus data klasifikasi surat berhasil!');
    }
}
