<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Auto;
use PDF;
use Illuminate\Support\Facades\DB;

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
        $autos = Auto::all(); 
        $pdf = PDF::loadView('autosPDF', compact('autos'))->setPaper('a4', 'landscape');
        return $pdf->stream('llista_autos.pdf');
    }

    public function generateUnicClientPDF($DNI)
    {
        // $dades_clients = Client::findOrFail($DNI);
        // $pdf = PDF::loadView('unicClientPDF', compact('dades_clients'))->setPaper('a4', 'portrait');
        // return $pdf->stream('client_' . $DNI . '.pdf');
        
        $dades_clients = Client::where('DNI', $DNI)->firstOrFail();
        $pdf = PDF::loadView('pdfView', compact('dades_clients'))->setPaper('a4', 'landscape');
        return $pdf->stream("client_{$DNI}.pdf");
    }
}