<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ketetapan;

class Pelanggaran_PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = ketetapan::all();
        return view ('jenis',compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis = new ketetapan;
        $jenis->jenis = $request->a;
        $jenis->nama = $request->b;
        $jenis->point = $request->c;
        $jenis->save();

        return redirect('jenis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = ketetapan::findOrFail($id);
        return view('jenis',compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = ketetapan::findOrFail($id);
        return view('jenisedit',compact('jenis'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $jenis = ketetapan::findOrFail($id);
        $jenis->jenis = $request->a;
        $jenis->nama = $request->b;
        $jenis->point = $request->c;
        $jenis->save();

        return redirect('jenis');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $jenis=ketetapan::find($id);
    
        ketetapan::destroy($id);

        return redirect('jenis');
 
    }
}
