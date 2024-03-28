<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function generate()
    {
        // Crea una instancia de mPDF
        $mpdf = new Mpdf();

        // Agrega contenido HTML al PDF
        $html = '<h1>Hello World</h1>';
        $mpdf->WriteHTML($html);

        // Descarga el PDF con el nombre 'filename.pdf'
        $mpdf->Output('filename.pdf', 'D');
    }
}
