<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class DesastresController extends Controller
{
    public function generarPdf()
    {
        // Datos de ejemplo (puedes cargarlos desde una base de datos)
        $desastres = [
            ['fecha' => '26 de diciembre de 2004', 'zona' => 'Océano Índico', 'impacto' => 'Tsunami, 230,000 muertos'],
            ['fecha' => '11 de marzo de 2011', 'zona' => 'Japón', 'impacto' => 'Terremoto y tsunami, 20,000 muertos'],
            ['fecha' => '28 de agosto de 2005', 'zona' => 'EE.UU.', 'impacto' => 'Huracán Katrina, 1,800 muertos'],
            ['fecha' => '26 de abril de 1986', 'zona' => 'Chernóbil, Ucrania', 'impacto' => 'Explosión nuclear, miles afectados'],
        ];

        // Generar PDF con la vista
        $pdf = Pdf::loadView('pdf.desastres', ['desastres' => $desastres])
                  ->setPaper('a4', 'landscape'); // Configuración de hoja horizontal

        // Descargar PDF
        return $pdf->download('desastres_naturales.pdf');
    }
}

