<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Menu;
use App\Level;
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

    public function menu(){
        $menu = DB::table('menu as a')->select('a.id','a.nama_menu','a.parent','a.url','a.icon','b.nama_menu as nama_parent')->leftJoin('menu as b', 'b.id','=','a.parent')->get();
        return view('template.menu', compact('menu'));
    }

    public function menu_add(){
        $menu = Menu::all();
        return view('template.menu_add', compact('menu'));
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
        
        return redirect('admin/menu')->with('message', 'Data menu berhasil ditambah');
    }

    public function menu_edit($id){
        $data = Menu::where('id',$id)->first();
        $menu = Menu::all();
        return view('template.menu_update', compact('data','menu'));
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

        return redirect('admin/menu')->with('message', 'Data menu berhasil diubah');
    }

    public function menu_destroy($id){
        $delete = Menu::findOrFail($id)->delete();
        return redirect('admin/menu')->with('message', 'Data menu berhasil dihapus');
    }

    public function level(){
        return view('template.level');
    }

    public function data_level(Request $request)
    {
        $level = Level::orderBy('id_level')->paginate(10);
        $response = [
            'pagination' => [
                'total' => $level->total(),
                'per_page' => $level->perPage(),
                'current_page' => $level->currentPage(),
                'last_page' => $level->lastPage(),
                'from' => $level->firstItem(),
                'to' => $level->lastItem()
            ],
            'data' => $level
        ];

        return response()->json($response);
    }

    public function level_search(Request $request)
    {
        $level = Level::orderBy('id_level')->where('deskripsi', 'like', $request->q.'%')->paginate(10);
        $response = [
            'pagination' => [
                'total' => $level->total(),
                'per_page' => $level->perPage(),
                'current_page' => $level->currentPage(),
                'last_page' => $level->lastPage(),
                'from' => $level->firstItem(),
                'to' => $level->lastItem()
            ],
            'data' => $level
        ];

        return response()->json($response);
    }

    public function level_store(Request $request){
        $this->validate($request, [
            'deskripsi' => 'required|unique:org_t_level_user,deskripsi'
        ]);

        $id_latest = Indras::get_latest_level_id();
        $create = Level::insert([
                  'deskripsi' => $request->deskripsi,
                  'id_level' => $id_latest
                ]);
        
        return response()->json($create);
    }

    public function level_update($id, Request $request){
        
        $this->validate($request, [
            'deskripsi' => $request->deskripsi == $request->deskripsiold ? 'required' : 'required|unique:org_t_level_user,deskripsi' 
        ]);

        $update = Level::where('id_level', $id)->update([
            'deskripsi' => $request->deskripsi
        ]);

        return response()->json($update);
    }

    public function level_destroy($id){
        $delete = Level::where('id_level', $id)->delete();
        return response()->json($delete);
    }

    public function level_access($id){
        $access = DB::table('akses')->where('id_level', $id)->get();
        return view('template.level_access', compact('access','id'));
    }

    public function level_access_update($id, Request $request){
      
      $id_level = $request->id_level;
      $menu_id = $request->menu_id != '' ? $request->menu_id : array();
      $insert = array();
      $daftar_menu = array();
      $menus = DB::table('akses')->select('menu_id')->where('id_level', $id_level)->get();
      $isi_menu = array();
      foreach ($menus as $value) {
         $isi_menu[] = $value->menu_id;
      }

      for($s=0;$s<count($menu_id);$s++){
        $hitung = DB::table('akses')->where(['menu_id' => $menu_id[$s], 'id_level' => $id_level])->count();
        if($hitung > 0){
             //     
        } else {
            $data = array(
                      'menu_id' => $menu_id[$s],
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

      for($s=0;$s<count($menu_id);$s++){
         if (($key = array_search($menu_id[$s], $isi_menu)) !== FALSE) {
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
            DB::table('akses')->where('id_level', $id_level)->where('menu_id', $isi_menu_delete[$s])->delete();
        }
      }

      // echo '<pre>';
      // print_r($isi_menu);
      // echo '</pre>';
      // exit(); 
      return redirect('admin/access_level/'.$id)->with('message', 'Akses berhasil diubah!');
        
    }


    public function users(){
        $branch = Cabang::all();
        $level = Level::all();
        $tipe = UserType::all();
        return view('template.users', compact('branch','level','tipe'));
    }

    public function data_users(Request $request)
    {
        $users = DB::table('users as a')->select('a.id_user','a.username','a.nama_lengkap','a.tempat_lahir','a.tgl_lahir','a.alamat','a.mobile','a.user_type','a.id_level','a.id_branch','a.active','d.kode_branch','d.nama_branch','b.deskripsi','c.tipe')->leftJoin('org_t_level_user as b','b.id_level','=','a.id_level')->leftJoin('user_type as c', 'c.id','=','a.user_type')->leftJoin('org_t_data_branch as d', 'd.id_branch','=','a.id_branch')->where('a.deleted_at','=', NULL)->paginate(10);

        $response = [
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ],
            'data' => $users
        ];

        return response()->json($response);
    }

    public function users_search(Request $request)
    {
        $users = DB::table('users as a')->select('a.id_user','a.username','a.nama_lengkap','a.tempat_lahir','a.tgl_lahir','a.alamat','a.mobile','a.user_type','a.id_level','a.id_branch','a.active','d.kode_branch','d.nama_branch','b.deskripsi','c.tipe')->leftJoin('org_t_level_user as b','b.id_level','=','a.id_level')->leftJoin('user_type as c', 'c.id','=','a.user_type')->leftJoin('org_t_data_branch as d', 'd.id_branch','=','a.id_branch')->where('a.deleted_at','=', NULL)->where('a.nama_lengkap', 'like', $request->q.'%')->paginate(10);

        $response = [
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ],
            'data' => $users
        ];

        return response()->json($response);
    }

    public function users_store(Request $request){
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users,username',
            'id_branch' => 'required',
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5',
            'id_level' => 'required'
        ]);

        $create = User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'id_branch' => $request->id_branch,
            'kode_branch' => Indras::get_branch_code($request->id_branch),
            'nama_branch' => Indras::get_branch_name($request->id_branch),
            'id_level' => $request->id_level,
            'user_type'  => $request->user_type,
            'active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return response()->json($create);
    }

    public function users_update($id, Request $request){
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => $request->username == $request->usernameold ? 'required' : 'required|unique:users,username',
            'id_branch' => 'required',
            'id_level' => 'required',
            'active' => 'required'
        ]);

      $edit = User::where('id_user', $id)->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'mobile' => $request->mobile,
            'id_branch' => $request->id_branch,
            'kode_branch' => Indras::get_branch_code($request->id_branch),
            'nama_branch' => Indras::get_branch_name($request->id_branch),
            'id_level' => $request->id_level,
            'user_type' => $request->user_type,
            'active' => $request->active,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return response()->json($edit);
    }

    public function users_update_password($id, Request $request){
        
        $this->validate($request, [
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5'
        ]);

        $edit = User::where('id_user', $id)->update([
            'password' => Hash::make($request->password),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return response()->json($edit);
    }

    public function users_delete($id){
        $delete = User::where('id_user', $id)->delete();
        return response()->json($delete);
    }

    public function exportToExcelUsers(){
        $user = DB::table('users as a')->select('a.username','a.nama_lengkap','a.active','d.kode_branch','d.nama_branch','b.tipe','c.deskripsi')->leftJoin('user_type as b', 'b.id','=','a.user_type')->leftJoin('org_t_level_user as c','c.id_level','=','a.id_level')->leftJoin('org_t_data_branch as d', 'd.id_branch','=','a.id_branch')->where('a.deleted_at', NULL)->get();
        return view('template.admin_exporttoexcel_users', compact('user'));
    }

    public function usertype(){
        return view('template.admin_usertype');
    }

    public function data_usertype(Request $request)
    {
        $tipe = UserType::select('tipe','id')->paginate(10);
         $response = [
            'pagination' => [
                'total' => $tipe->total(),
                'per_page' => $tipe->perPage(),
                'current_page' => $tipe->currentPage(),
                'last_page' => $tipe->lastPage(),
                'from' => $tipe->firstItem(),
                'to' => $tipe->lastItem()
            ],
            'data' => $tipe
        ];

        return response()->json($response);
    }

    public function usertype_search(Request $request){
        $tipe = UserType::select('tipe','id')->where('tipe', 'like', "%$request->q%")->paginate(10);
         $response = [
            'pagination' => [
                'total' => $tipe->total(),
                'per_page' => $tipe->perPage(),
                'current_page' => $tipe->currentPage(),
                'last_page' => $tipe->lastPage(),
                'from' => $tipe->firstItem(),
                'to' => $tipe->lastItem()
            ],
            'data' => $tipe
        ];

        return response()->json($response);
    }

    public function usertype_store(Request $request)
    {
        $this->validate($request, [
            'tipe' => 'required'
        ]);

        $create = UserType::create($request->all());
        return response()->json($create);

    }

    public function usertype_update(Request $request, $id)
    {
        $this->validate($request, [
            'tipe' => 'required'
        ]);

        $edit = UserType::findOrFail($id)->update($request->all());
        return response()->json($edit);
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
