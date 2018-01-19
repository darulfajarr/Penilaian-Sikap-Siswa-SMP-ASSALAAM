<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Datatables;

class AdminController extends Controller
{
        public function index(){
		// $data['admin'] = User::all();
		$data['admin'] = DB::table('users')
						->leftJoin('positions','users.id','=','positions.id')
						// ->join('education','positions.id','=','education.id')
						->where('positions.year_end','=','Now')
						->select('*')
						->get();
		$data['blogs'] = Auth::id();
		return view('admin',$data);
	}

	// public function data(Request $request){   
 //        if($request->ajax()){
 //            $data = DB::table('users')
	// 				->leftJoin('positions','users.id','=','positions.id')
	// 				->where('positions.year_end','=','Now')
	// 				->select('*')
	// 				->get();
 //            return Datatables::of($data)
 //                    // tambah kolom untuk aksi edit dan hapus
 //                    ->addColumn('action', 
 //                    '<a href="#" title="Edit" class="btn-sm btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    
 //                    <form style="display: inline">
 //                        <input name="_method" type="hidden" value="DELETE">
 //                        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
 //                        <button class="btn-sm btn-danger" type="button" style="border: none"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
 //                    </form>')
 //                    ->make(true);
 //        } else {
 //            exit("Not an AJAX request -_-");
 //        }
 //    }

	public function show($id){
   		$delect = User::where('id',$id)
   				->delete();
   		return redirect('/home');
   	}

	public function update(Request $request, $id){
   		$user = User::find($id);
   		$user->update($request->all());
   		return redirect('/home');
   	}


	public function store(Request $request){
   		User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'notelp' => $request['notelp'],
            'typeuser' => $request['typeuser'],
            'address' => $request['address'],
            'obj_decs' => $request['obj_decs'],
            'image' => $request['image'],
            'status' => $request['status'],
        ]);

        $request->session()->flash('alert-success', 'User was successful added!');
   		return redirect('/home');
   	}

   	public function logout(Request $request, $id){
        Auth::logout($id);
        return redirect('/login');

    }

    public function maintenance(){
    	return view('coba');
    }

    public function lihat($id){
    	$data['ea'] = User::find($id);
		$data['edu'] = 	DB::table('users')
				->join('education','users.id','=','education.id')
				->join('academics','education.id_ac','=','academics.id_ac')
				->where('users.id','=',$id)
				->orderBy('id_ed','asc')
				->select('*')
				->get();
		$data['ac'] = DB::table('academics')
				->select('*')
				->get();
		$data['skill'] = DB::table('users')
				->join('skills','users.id','=','skills.id')
				->where('users.id','=',$id)
				->select('*')
				->first();
		$data['ex'] = DB::table('users')
				->join('positions','users.id','=','positions.id')
				->join('experiences','positions.id_position','=','experiences.id_position')
				->orderBy('year_start','asc')
				->where('users.id','=',$id)
				->select('*')
				->get();
		$data['pos'] = DB::table('users')
				->join('positions','users.id','=','positions.id')
				->where('users.id','=',$id)
				->orderBy('year_start','asc')
				->select('*')
				->get();
		return redirect('/view',$data);
    }

	// public function coba($id){
 //   		$data['blogs'] = Auth::find($id);
 //   		return view('admin',$data);
 //   	}

	// public function destroy($id){
 //   		User::destroy($id);
 //   		return redirect('/home');
 //   	}
}