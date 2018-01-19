<?php

namespace App\Http\Controllers;

use App\siswaa;
use App\History;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SiswaaController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$data['siswaa'] = DB::table('siswaas')
                        ->join('kelas','kelas.id','=','siswaas.kelas')
                        ->select('siswaas.*','kelas.tingkat_kelas','kelas.nama_kelas')
                        ->orderBy('siswaas.kelas','asc')
                        ->get();
        return view('siswa.all',$data);
    }


public function detail($id){
        $d = $id;
        $detail= History::where('id_siswa', $id)->get();
        return view('siswa.historysiswa',compact('detail','d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswaa.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nis' => 'unique:siswaas']);

        $siswaa = new siswaa;
        $siswaa->nis = $request->nis;
        $siswaa->nama = $request->b;
        $siswaa->kelas = $request->c;
        $siswaa->jenis_kelamin = $request->d;
        $siswaa->point = $request->e;
        $siswaa->save();

        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswaa  $siswaa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $siswaa = siswaa::findOrFail($id);
        return view('siswa.show',compact('siswaa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswaa  $siswaa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
$siswaa = siswaa::findOrFail($id);
        return view('siswa.editsiswa',compact('siswaa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\siswaa  $siswaa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswaa = siswaa::findOrFail($id);
        $siswaa->nis = $request->a;
        $siswaa->nama = $request->b;
        $siswaa->kelas = $request->c;
        $siswaa->jenis_kelamin = $request->d;
        $siswaa->point = $request->e;
        $siswaa->save();

        return redirect('siswa');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswaa  $siswaa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $siswaa=siswaa::find($id);
    
        siswaa::destroy($id);

        return redirect('siswa');
    }

     public function siswakelas($id)
    {$data['siswaa'] = DB::table('siswaas')
                        ->join('kelas','kelas.id','=','siswaas.kelas')
                        ->select('siswaas.*','kelas.tingkat_kelas','kelas.nama_kelas')
                        ->where('siswaas.kelas',$id)
                        ->orderBy('siswaas.kelas','asc')
                        ->get();
        return view('siswa.index',$data);
    }
}
