<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Auto;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $dades_clients = Client::all();
        $pdf = PDF::loadView('pdfView', compact('dades_clients'))->setPaper('a4', 'landscape');
        return $pdf->stream('llista_clients.pdf');
    }
    public function generateAutoPDF()
    {
        $Autos = Auto::all(); 
        $pdf = PDF::loadView('autosPDF', compact('autos'))->setPaper('a4', 'landscape');
        return $pdf->stream('llista_autos.pdf');
    }
    
}