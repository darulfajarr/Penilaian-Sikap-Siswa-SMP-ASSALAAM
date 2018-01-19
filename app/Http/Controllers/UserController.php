<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Kelas;
use App\Penghubung;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $user=Role::where('name','guru')->first()->users;
        return view ('user.index',compact('user'));
    }



    public function admin()
    {
          $user=Role::where('name','admin')->first()->users;
        return view ('user.admin',compact('user'));
    }

public function bk()
    {
          $user=Role::where('name','bk')->first()->users;
        return view ('user.bk',compact('user'));
    }

    public function kepsek()
    {
          $user=Role::where('name','kepsek')->first()->users;
        return view ('user.kepsek',compact('user'));
    }

 public function wawali()
    {
          $user=Role::where('name','walikelas')->first()->users;
        return view ('user.walikelas',compact('user'));
    }





    public function walikelas()
    {
         $user=Role::where('name','walikelas')->first()->users;
        return view ('walikelas.index',compact('user'));
    }
    public function walikelass($id)
    {
        $data['siswaa'] = DB::table('siswaas')
                        ->join('kelas','kelas.id','=','siswaas.kelas')
                        ->select('siswaas.*','kelas.tingkat_kelas','kelas.nama_kelas')
                        ->where('siswaas.kelas',$id)
                        ->orderBy('siswaas.kelas','asc')
                        ->get();
        $kelas= Kelas::find($id);
        return view ('walikelas.index2',$data)->with(compact('kelas'));
    }

    public function tambah(Request $request , $id)
    {
        $penghubung= Penghubung::where('id',$id)->count();
        if($penghubung == 0){
            $p = new Penghubung();
            $p->id = $id;
            $p->user_id = $id;
            $p->kelas_id = $request->c;
            $p->save();
            return redirect ('/walikelas');
        }else{
            $p=Penghubung::find($id);
            $p->id = $id;
            $p->user_id = $id;
            $p->kelas_id = $request->c;
            $p->save();
            return redirect ('/walikelas');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $user = new User();
      $user->name =$request['a'];
      $user->email =$request['b'];
      $user->password=bcrypt($request['c']);
      $user->save();
      
      $guruRole = Role::where('name','guru')->first();
      $user->attachRole($guruRole);
        return redirect('user');
    }
    public function storewali(Request $request)
    {

      $user = new User();
      $user->name =$request['a'];
      $user->email =$request['b'];
      $user->password=bcrypt($request['c']);
      $user->save();
      
      $walikelasRole = Role::where('name','walikelas')->first();
      $user->attachRole($walikelasRole);
        return redirect ('/walikelas');
    }









    public function storeadmin(Request $request)
    {


      $user = new User();
      $user->name =$request['a'];
      $user->email =$request['b'];
      $user->password=bcrypt($request['c']);
      $user->save();
      
      $adminRole = Role::where('name','admin')->first();
      $user->attachRole($adminRole);
        return redirect ('/admin');
    }

    public function storebk(Request $request)
    {

      $user = new User();
      $user->name =$request['a'];
      $user->email =$request['b'];
      $user->password=bcrypt($request['c']);
      $user->save();
      
      $bkRole = Role::where('name','bk')->first();
      $user->attachRole($bkRole);
        return redirect ('/bk');
    }

    public function storekepsek(Request $request)
    {

      $user = new User();
      $user->name =$request['a'];
      $user->email =$request['b'];
      $user->password=bcrypt($request['c']);
      $user->save();
      
      $kepsekRole = Role::where('name','kepsek')->first();
      $user->attachRole($kepsekRole);
        return redirect ('/kepsek');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = user::findOrFail($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = user::findOrFail($id);
        $user->name = $request->a;
        $user->email = $request->b;
        $user->password = $request->c;
        $user->save();

        return redirect('user');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user=user::find($id);
    
        user::destroy($id);

        return redirect('user');
    }



     public function hapusadmin($id)
    {
       $user=user::find($id);
    
        user::destroy($id);

        return redirect ('/admin');
    }

     public function hapusbk($id)
    {
       $user=user::find($id);
    
        user::destroy($id);

        return redirect('/bk');
    }

     public function hapuswali($id)
    {
       $user=user::find($id);
    
        user::destroy($id);

        return redirect ('/wawali');
    }

     public function hapuskepsek($id)
    {
       $user=user::find($id);
    
        user::destroy($id);

        return redirect('/kepsek');
    }
}
