<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class EditController extends Controller
{
    public function update(Request $request, $id){
   		$data = [
            'password' => bcrypt($request['newpassword']),
        ];
   		$user = User::where('id',$id)->update($data);
   		$request->session()->flash('alert-success', 'User was successful update!');
   		return redirect('/...');
   	}
   	public function show($id){
   		$data['ea'] = User::find($id);
		$data['edu'] = 	DB::table('users')
						->leftJoin('education','users.id','=','education.id')
						->leftJoin('academics','education.id_ac','=','academics.id_ac')
						->where('users.id','=',$id)
						->orderBy('id_ed','asc')
						->select('*')
						->get();
		$data['ac'] = 	DB::table('academics')
						->select('*')
						->get();
		$data['skill'] = DB::table('users')
						->leftJoin('skills','users.id','=','skills.id')
						->where('users.id','=',$id)
						->select('*')
						->first();
		$data['ex1'] = DB::table('users')
						->leftJoin('positions','users.id','=','positions.id')
						->leftJoin('experiences','positions.id_position','=','experiences.id_position')
						->orderBy('year_start','asc')
						->where('users.id','=',$id)
						->select('*')
						->get();
		$data['ex'] = DB::table('users')
						->leftJoin('positions','users.id','=','positions.id')
						->leftJoin('experiences','positions.id_position','=','experiences.id_position')
						->orderBy('year_start','asc')
						->where('users.id','=',$id)
						->select('*')
						->get();
		$data['pos'] = DB::table('users')
				->leftJoin('positions','users.id','=','positions.id')
				->where('users.id','=',$id)
				->orderBy('year_start','asc')
				->select('*')
				->get();
		return view('view',$data);
	}

}
