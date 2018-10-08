<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Form;
use App\Level;
use App\Akses;

class LevelController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $data = Level::all();
        return view('template.level.index', compact('data'));
    }

    public function level_add(){
        return view('template.level.level_add');
    }

    public function level_store(Request $request){
        $this->validate($request, [
            'nama_level' => 'required|unique:level,nama_level'
        ]);

        Level::create($request->all());
        return redirect('level')->with('message', 'Level berhasil ditambah!');
    }

    public function level_edit($id){
        $data = Level::where('id',$id)->first();
        return view('template.level.level_update', compact('data'));
    }

    public function level_update($id, Request $request){
        
        $this->validate($request, [
            'nama_level' => $request->nama_level_old == $request->nama_level ? 'required' : 'required|unique:level,nama_level' 
        ]);

        Level::findOrFail($id)->update([
            'nama_level' => $request->nama_level
        ]);

        return redirect('level')->with('message', 'Level berhasil diubah!');
    }

    public function level_destroy($id){
        Level::findOrFail($id)->delete();
        return redirect('level')->with('message', 'Level berhasil dihapus!');
    }

    public function level_access($id){
        $access = Akses::where('id_level', $id)->get();
        return view('template.level.level_access', compact('access','id'));
    }

    public function level_access_update($id, Request $request){
      
      $id_level = $request->id_level;
      $id_menu = $request->id_menu != '' ? $request->id_menu : array();
      $insert = array();
      $daftar_menu = array();
      $menus = DB::table('akses')->select('id_menu')->where('id_level', $id_level)->get();
      $isi_menu = array();
      foreach ($menus as $value) {
         $isi_menu[] = $value->id_menu;
      }

      for($s=0;$s<count($id_menu);$s++){
        $hitung = DB::table('akses')->where(['id_menu' => $id_menu[$s], 'id_level' => $id_level])->count();
        if($hitung > 0){
             //     
        } else {
            $data = array(
                      'id_menu' => $id_menu[$s],
                      'id_level' => $id_level,
                      'created_at' => date('Y-m-d H:i:s'),
                      'updated_at' => date('Y-m-d H:i:s')
            );
            $insert[] = $data;
        }
      }

      if(count($insert) > 0){
        DB::table('akses')->insert($insert);
      }
      // } else {
      // //   Akses::where('id_level', $id_level)->delete();
      // // }

      for($s=0;$s<count($id_menu);$s++){
         if (($key = array_search($id_menu[$s], $isi_menu)) !== FALSE) {
              unset($isi_menu[$key]);
         }
      }

      array_unique($isi_menu);
      $isi_menu_delete = array();
      foreach ($isi_menu as $key => $value) {
          $isi_menu_delete[] = $value;
      }

      // echo '<pre>';
      // print_r($isi_menu_delete);
      // echo '</pre>';
      // exit();
      if(count($isi_menu_delete) > 0){
        for($s=0;$s<count($isi_menu_delete);$s++){ 
            DB::table('akses')->where('id_level', $id_level)->where('id_menu', $isi_menu_delete[$s])->delete();
        }
      }

      // echo '<pre>';
      // print_r($isi_menu);
      // echo '</pre>';
      // exit(); 
      return redirect('level/access_level/'.$id)->with('message', 'Akses berhasil diubah!');
        
    }
}
