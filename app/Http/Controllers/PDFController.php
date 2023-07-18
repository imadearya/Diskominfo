<?php

namespace App\Http\Controllers;
use PDF;
use Dompdf\Dompdf;
use App\Models\Korban;
use App\Models\Bencana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Rusak;
use Illuminate\Support\Facades\View;


class PDFController extends Controller
{
    public function downloadPDF()
    {
        $korbans = Korban::select('bencana_id', 'NIK', 'nama', 'umur', 'status')->get();

        $pdf = PDF::loadView('pdf.table', compact('korbans'));

        return $pdf->download('table.pdf');
    }
    public function downloadPDFBanjir()
    {
        $bencanas = Bencana::with('kecamatan')
            ->where('nama', 'Banjir')
            ->orderBy('tanggal', 'desc')
            ->orderBy('nama')
            ->orderBy('kecamatan_id')
            ->get();
        $kecamatans = Kecamatan::all();

        $pdf = PDF::loadView('pdf.tablebanjir', compact('bencanas','kecamatans'));

        return $pdf->download('databanjir.pdf');
    }
    public function downloadPDFKantor()
    {
        $kerusakans = Rusak::with('bencana')->where('nama', 'Kantor Rusak')->get();
        $bencanas = Bencana::all();

        $pdf = PDF::loadView('pdf.tablekantor', compact('kerusakans','bencanas'));

        return $pdf->download('datakantor.pdf');
    }
}

