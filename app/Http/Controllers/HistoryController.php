<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use PDF;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = History::orderBy('created_at','now')->get();
        return view('history.index',compact('history'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     public function print(Request $request)
    {
        $t= date('Y-m', strtotime($request->tgl));
        $detail= History::where('created_at','LIKE','%'.$t.'%')->get();
        $tgl= History::where('created_at',$request->tgl)->first();
        $pdf = PDF::loadView('history.print',compact('tgl','detail'))->setPaper('a4');
 
        return $pdf->stream();
    }

    public function printsiswa($id ){
        
        $detail= History::where('created_at','LIKE','%'.$t.'%')->get();
        $tgl= History::where('created_at',$request->tgl)->first();
        $pdf = PDF::loadView('history.printsiswa',compact('detail'))->setPaper('a4');
        
        return $pdf->stream();
    }



}
