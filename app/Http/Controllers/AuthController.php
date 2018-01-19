<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use Auth;
use App\User;
use DB;
Use Datatables;

class AuthController extends Controller
{
        public function login(Request $request){
        return view('auth.login');
    }


    public function data(Request $request){   
        // if($request->ajax()){
            $users = DB::table('users')
                    ->leftJoin('skills','users.id','=','skills.id')
                    ->rightJoin('positions','skills.id','=','positions.id')
                    ->join('education','positions.id','=','education.id')
                    // ->groupBy('users.id')
                    ->get();
            //dd($users);
            return Datatables::of($users)
                    // // tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', function($users){
                    return 
                    '<div class="resume-action">
                        <div class="dropdown">
                          <button id="moreAct" type="button" class="btn-clean" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View more
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="moreAct">
                            <li>
                              <a target="_blank" href="'.url('view/'.$users->id).'" class="btn btn-sm"><i class="mdi mdi-eye"></i> View</a>
                            </li>
                            <li>
                              <a data-method="delete" href="'.url('view/'.$users->id).'" class="btn btn-sm" onclick="alertd()"><i class="mdi mdi-recycle"></i> delete</a>
                                </li>
                                <li>
                                <a target="_blank" href="'.url('pdf/'.$users->id).'" class="btn btn-sm"><i class="mdi mdi-file-pdf"></i> Export to PDF</a>
                                </li>
                            </ul>
                        </div>
                    </div>';
                    })
                    // ->addColumn('thumb',function($users){
                        // return '
                        // <div class="resume-detail">
                            // <img src="'.asset('images/'.$users->image).'" alt="username resume" class="img-responsive"/>
                        // </div>';
                    // })
                    ->addColumn('status',function($users){
                        if($users->status == "Active"){
                            return '
                                <form action="'.url('/home/'.$users->id).'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="name" value="'.$users->name.'">
                                    <input type="hidden" name="address" value="'.$users->address.'">
                                    <input type="hidden" name="status" value="Not Active">
                                    <td data-label="Status"><center><button type="submit" class="btn btn-success btn-xs">'.$users->status.'</button></center></td>
                                </form>';
                        }elseif($users->status == "Not Active"){
                            return '
                                <form action="'.url('/home/'.$users->id).'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <input type="hidden" name="_method" value="PUT">    
                                    <input type="hidden" name="name" value="'.$users->name.'">
                                    <input type="hidden" name="address" value="'.$users->address.'">
                                    <input type="hidden" name="status" value="Active">
                                    <td data-label="Status"><center><button type="submit" class="btn btn-danger btn-xs">'.$users->status.'</button></center></td>
                                    </form>';
                                }
                    })
                    ->rawColumns(['thumb','action','status'])
                    ->make(true);
        // } else {
        //     exit("Not an AJAX request -_-");
        // }
    }

    public function postLogin(Request $request){
        //login
        $error = new MessageBag;
        // $credentialsa = [
        //  'email'=>$request->email,
        //  'password'=>$request->password,
        //  'typeuser'=>'admin'
        // ];

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        // dd($credentials);
        if (Auth::attempt($credentials)){
            if(Auth::user()->typeuser == 'admin' && Auth::user()->status == 'Active'){
                return redirect('/home');
            }elseif(Auth::user()->typeuser == 'user' && Auth::user()->status == 'Active'){
                return redirect('/index');
            }else{
                return redirect('/login/disable');
            }
        }else{

            //return redirect()->back()->with('error_login','Username or Password incorrect');
            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
            return redirect()->back()->withErrors($errors)->withInput($request->except('password'));
        }

        // return redirect()->back()->with('error_login','Username or Password incorrect');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');

    }


    public function disable(){
        return view('auth.disable');
    }

}