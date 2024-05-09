<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Auto;
use App\Models\Lloga;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function generateUnicAutoPDF($Matricula_auto)
    {
        $dades_auto = Auto::where('Matricula_auto', $Matricula_auto)->firstOrFail(); 
        $pdf = PDF::loadView('autosPDF', compact('dades_auto'))->setPaper('a4', 'landscape');
        return $pdf->stream('llista_{$Matricula_auto}.pdf');
    }

    public function generateUnicClientPDF($DNI)
    {
        $dades_clients = Client::where('DNI', $DNI)->firstOrFail();
        $pdf = PDF::loadView('pdfView', compact('dades_clients'))->setPaper('a4', 'landscape');
        return $pdf->stream("client_{$DNI}.pdf");
    }

    public function generateUnicLlogaPDF($DNI, $Matricula_auto)
    {
        $dades_lloga = Lloga::where('DNI', $DNI)->firstOrFail();
        $pdf = PDF::loadView('llogaPDF', compact('dades_lloga'))->setPaper('a4', 'landscape');
        return $pdf->stream("lloga_{$DNI}_{$Matricula_auto}.pdf");
    }

    public function generateUnicUserPDF($id)
    {
        $dades_users = User::where('id', $id)->firstOrFail();
        $pdf = PDF::loadView('pdfView', compact('dades_users'))->setPaper('a4', 'landscape');
        return $pdf->stream("client_{$id}.pdf");
    }
}