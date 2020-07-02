<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function invoice($id){
        $sale = Sale::find($id);
        return PDF::loadView('sale.print', array('sale' => $sale));
    }
}
