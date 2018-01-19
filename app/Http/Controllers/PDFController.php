<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\History;

class PDFController extends Controller
{
    //
    public function pdf()
    {

        $detail= History::get();
        $pdf = PDF::loadView('pdf', ['detail' => $detail]);
        return $pdf -> download('personal.pdf');
    }
}
