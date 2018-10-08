<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Form;
use App\Menu;

class MenuController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $menu = DB::table('menu as a')->select('a.id','a.nama_menu','a.parent','a.url','a.icon','b.nama_menu as nama_parent')->leftJoin('menu as b', 'b.id','=','a.parent')->where('a.deleted_at', NULL)->get();
        return view('template.menu.index', compact('menu'));
    }

    public function menu_add(){
        $menu = Menu::all();
        return view('template.menu.menu_add', compact('menu'));
    }

    public function menu_store(Request $request){
        $this->validate($request, [
            'nama_menu' => 'required|string'
        ]);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'icon' => $request->icon,
            'url' => $request->url,
            'parent' => $request->parent
        ]);
        
        return redirect('menu')->with('message', 'Data menu berhasil ditambah');
    }

    public function menu_edit($id){
        $data = Menu::where('id',$id)->first();
        $menu = Menu::all();
        return view('template.menu.menu_update', compact('data','menu'));
    }

    public function menu_update($id, Request $request){
        $this->validate($request, [
            'nama_menu' => 'required|string'
        ]);

        Menu::findOrFail($id)->update([
            'nama_menu' => $request->nama_menu,
            'icon' => $request->icon,
            'url' => $request->url,
            'parent' => $request->parent
        ]);

        return redirect('menu')->with('message', 'Data menu berhasil diubah');
    }

    public function menu_destroy($id){
        $delete = Menu::findOrFail($id)->delete();
        return redirect('menu')->with('message', 'Data menu berhasil dihapus');
    }
}
