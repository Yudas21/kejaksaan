<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Menu;
use App\Level;
 
class Indras {

    public static function count_user($username) {
        $data = User::where('username', $username)->count();
        return $data;
    }

    public static function data_user($id_user) {
        $data = User::where('username', $id_user)->first();
        return $data;
    }

    public static function data_level_user($id_level) {
        $data = Level::where('id_level', $id_level)->get();
        return $data;
    }

     public static function get_parent() {
        $menus = Menu::where('parent', 0)->get();
        return $menus;
    }

    public static function get_my_menu($id_level)
    {
        $data_menu = array();
        $menus = DB::table('akses')->select('id_menu')
                ->where('id_level', $id_level)
                ->get();
        foreach ($menus as $key) {
            if($key->id_menu){
                array_push($data_menu, $key->id_menu);
            }
        }
        return $data_menu;
    }

    public static function get_count_child($id) {
        $menus = Menu::where('parent', $id)
                ->count();
        return $menus;
    }

    public static function get_child($id) {
        $menus = Menu::where('parent', $id)
                ->orderBy('no_urut')
                ->get();
        return $menus;
    }

    public static function get_level_name($id) {
        $name = '';
        $menus = Level::select('nama_level')->where('id', $id)->get();
        if(Level::select('nama_level')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $name = $value->nama_level;
            }
        }
        return $name;
    }

    //============== old ============// 

     public static function data_user_photo($id_user) {
        $name = '';
        $levels = User::select('foto')->where('id_user', $id)->get();
        if(User::where('id_user', $id)->count() > 0){
            foreach ($levels as $value) {
                $name = $value->foto;
            }
        }
        return $name;
    }


    public static function get_mymenu($id) {
        $data_menu = array();
        $menus = DB::table('akses')->select('id_menu')->where('id_level', $id)->get();
        foreach ($menus as $key) {
            $data_menu[] = $key->id_menu;
        }
        return $data_menu;
    }

    public static function get_parent_id($id) {
        $parent = '';
        $menus = Menu::select('parent')->where('id', $id)->get();
        if(Menu::select('parent')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $parent = $value->parent;
            }
        }
        return $parent;
    }

    
}