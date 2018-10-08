<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Bagian;

class BagianController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = Bagian::where('deleted_at', NULL)->get();
        return view('template.bagian.index', compact('data'));
    }

    public function bagian_add(){
    	return view('template.bagian.bagian_add');
    }

    public function bagian_store(Request $request){
        $this->validate($request, [
            'nama_bagian' => 'required|unique:bagian,nama_bagian'
        ]);

        Bagian::create([
            'nama_bagian' => $request->nama_bagian,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('bagian')->with('messsage', 'Tambah user baru berhasil!');
    }

    public function bagian_edit($id){
    	$data = Bagian::where('id', $id)->first();
    	return view('template.bagian.bagian_update', compact('data'));
    }

    public function bagian_update($id, Request $request){
        $this->validate($request, [
            'nama_bagian' => $request->nama_bagian == $request->nama_bagian_old ? 'required' : 'required|unique:bagian,nama_bagian'
        ]);

      Bagian::findOrFail($id)->update([
            'nama_bagian' => $request->nama_bagian,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('bagian')->with('messsage', 'Ubah data user berhasil!');
    }

    public function bagian_delete($id){
        Bagian::findOrFail($id)->delete();
        return redirect('bagian')->with('messsage', 'Hapus data bagian berhasil!');
    }
}
