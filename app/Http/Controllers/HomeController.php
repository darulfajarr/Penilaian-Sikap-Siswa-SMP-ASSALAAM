<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

           $History = History::orderBy('created_at','now')->take(10)->get();
        return view('now',compact('History'));
    }
}
