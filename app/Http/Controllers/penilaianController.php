<?php

namespace App\Http\Controllers;
use App\siswaa;
use App\jeniss;
use App\pdp;
use App\History;
use App\ketetapan;
use Auth;
use Illuminate\Http\Request;

class penilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
        $siswaa = new siswaa;
        $siswaa->nis = $request->a;
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
        return view('siswaa.show',compact('siswaa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswaa  $siswaa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $data['siswaa'] = DB::table('siswaas')
                        ->join('kelas','kelas.id','=','siswaas.kelas')
                        ->select('siswaas.*','kelas.tingkat_kelas','kelas.nama_kelas')
                        ->where('siswaas.kelas',$id)
                        ->orderBy('siswaas.kelas','asc')
                        ->get();
        return view('siswa.edit',$data);
    }

    public function prestasi($id)
    {
        $ketetapan= ketetapan::where('jenis', 'Prestasi')->get();
        $siswaa = siswaa::findOrFail($id);
        return view('siswa.edit',compact('siswaa','ketetapan'));
    }
    public function pelanggaran($id)
    {

     $ketetapan= ketetapan::where('jenis', 'Pelanggaran')->get();
        $siswaa = siswaa::findOrFail($id);
        return view('siswa.edit',compact('siswaa','ketetapan'));
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
        $ket= ketetapan::find($request->ketetapan);
        $skor = $ket->point;
        $terang= $ket->jenis;
        $test = $ket->nama;
        $siswaa = siswaa::findOrFail($id);
        $siswaa->nis = $request->a;
        $siswaa->nama = $request->b;
        $siswaa->kelas = $request->c;
        $siswaa->jenis_kelamin = $request->d;
        $hasil= $siswaa->point + $skor;
        $siswaa->point = $hasil;
        $siswaa->save();

        $History = new History;
        $History->id_siswa = $siswaa->id;
        $History->point_awal = $request->x;
        $History->point_tdk = $skor;
        $History->point_akhir = $hasil;
        $History->jenis = $terang.":".$test;
        $History->penilai = Auth::user()->name;
        $History->save();
        return redirect('history');
        
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
}
