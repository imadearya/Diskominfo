<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Rusak;
use App\Models\Korban;
use App\Models\Bencana;
use App\Models\Kecamatan;
use App\Models\Pengungsi;
use App\Models\Penampungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PemkotController extends Controller
{
    public function index(){
        $totalbencana = Bencana::whereYear('tanggal', '=', '2023')->count();
        $totalkerusakan = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->sum('rusaks.total');
        $totalkorban = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->count();
        
        $jumlahBencanasPerBulan = [];
        $jumlahRusaksPerBulan = [];
        $jumlahKorbansPerBulan = [];
    
        // Loop melalui bulan-bulan pada tahun 2023
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // Ambil jumlah data bencanas pada bulan dan tahun tertentu
            $jumlahBencanas = Bencana::whereYear('tanggal', '=', 2023)
                                    ->whereMonth('tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data bencanas ke dalam array
            $jumlahBencanasPerBulan[] = $jumlahBencanas;
    
            // Ambil jumlah data rusaks pada bulan dan tahun tertentu
            $jumlahRusaks = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                                ->whereYear('bencanas.tanggal', '=', 2023)
                                ->whereMonth('bencanas.tanggal', '=', $bulan)
                                ->sum('rusaks.total');
            // Tambahkan jumlah data rusaks ke dalam array
            $jumlahRusaksPerBulan[] = $jumlahRusaks;
    
            // Ambil jumlah data korbans pada bulan dan tahun tertentu
            $jumlahKorbans = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                                    ->whereYear('bencanas.tanggal', '=', 2023)
                                    ->whereMonth('bencanas.tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data korbans ke dalam array
            $jumlahKorbansPerBulan[] = $jumlahKorbans; 
        }                   
        return view('pemkot.dashboard', compact('totalbencana','totalkerusakan','totalkorban', 'jumlahKorbansPerBulan', 'jumlahRusaksPerBulan','jumlahBencanasPerBulan'));

    }

    public function stat(){
        $totalbencana = Bencana::whereYear('tanggal', '=', '2023')->count();
        $totalkerusakan = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->sum('rusaks.total');
        $totalkorban = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->count();
        $dataRusak = DB::table('rusaks')
                ->select(DB::raw('COUNT(*) as jumlah_kerusakan'))
                ->groupBy('nama')
                ->pluck('jumlah_kerusakan')
                ->toArray();
        $data = DB::table('bencanas')
                ->select('nama', DB::raw('COUNT(*) as jumlah_bencana'))
                ->whereIn('nama', ['Banjir', 'Kebakaran', 'Puting Beliung', 'Gempa Bumi', 'Longsor', 'Rob'])
                ->groupBy('nama')
                ->pluck('jumlah_bencana')
                ->toArray();
        $banjir = Bencana::where('nama', 'Banjir')->count();
        $kebakaran = Bencana::where('nama', 'Kebakaran')->count();
        $puting = Bencana::where('nama', 'Puting Beliung')->count();
        $gempa = Bencana::where('nama', 'Gempa Bumi')->count();
        $longsor = Bencana::where('nama', 'Longsor')->count();
        $rob = Bencana::where('nama', 'Rob')->count();

        $rumahr = Rusak::where('nama', 'Rumah Rusak Ringan')->count();
        $rumahb = Rusak::where('nama', 'Rumah Rusak Berat')->count();
        $rumaht = Rusak::where('nama', 'Rumah Terendam')->count();
        $kantor = Rusak::where('nama', 'Kantor Rusak')->count();
        $jembatan = Rusak::where('nama', 'Jembatan Rusak')->count();
        $publik = Rusak::where('nama', 'Sarana Publik Rusak')->count();

        return view('pemkot.stat', compact('totalbencana','totalkerusakan','totalkorban','data','dataRusak','banjir','puting','gempa', 'longsor', 'rob','kebakaran', 'rumahr', 'rumahb','rumaht','kantor','jembatan','publik'));
    }

    public function kerusakan(){
        $totalbencana = Bencana::whereYear('tanggal', '=', '2023')->count();
        $totalkerusakan = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->sum('rusaks.total');
        $totalkorban = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->count();
        $rumahr = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
        ->where('rusaks.nama', 'Rumah Rusak Ringan')
        ->whereYear('bencanas.tanggal', 2023)
        ->count();
        
        $rumahb = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
            ->where('rusaks.nama', 'Rumah Rusak Berat')
            ->whereYear('bencanas.tanggal', 2023)
            ->count();
        
        $rumaht = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
            ->where('rusaks.nama', 'Rumah Terendam')
            ->whereYear('bencanas.tanggal', 2023)
            ->count();
        
        $kantor = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
            ->where('rusaks.nama', 'Kantor Rusak')
            ->whereYear('bencanas.tanggal', 2023)
            ->count();
        
        $jembatan = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
            ->where('rusaks.nama', 'Jembatan Rusak')
            ->whereYear('bencanas.tanggal', 2023)
            ->count();
        
        $publik = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
            ->where('rusaks.nama', 'Sarana Publik Rusak')
            ->whereYear('bencanas.tanggal', 2023)
            ->count();        
        $jumlahBencanasPerBulan = [];
        $jumlahRusaksPerBulan = [];
        $jumlahKorbansPerBulan = [];
    
        // Loop melalui bulan-bulan pada tahun 2023
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // Ambil jumlah data bencanas pada bulan dan tahun tertentu
            $jumlahBencanas = Bencana::whereYear('tanggal', '=', 2023)
                                    ->whereMonth('tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data bencanas ke dalam array
            $jumlahBencanasPerBulan[] = $jumlahBencanas;
    
            // Ambil jumlah data rusaks pada bulan dan tahun tertentu
            $jumlahRusaks = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                                ->whereYear('bencanas.tanggal', '=', 2023)
                                ->whereMonth('bencanas.tanggal', '=', $bulan)
                                ->sum('rusaks.total');
            // Tambahkan jumlah data rusaks ke dalam array
            $jumlahRusaksPerBulan[] = $jumlahRusaks;
    
            // Ambil jumlah data korbans pada bulan dan tahun tertentu
            $jumlahKorbans = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                                    ->whereYear('bencanas.tanggal', '=', 2023)
                                    ->whereMonth('bencanas.tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data korbans ke dalam array
            $jumlahKorbansPerBulan[] = $jumlahKorbans; 
        }                   
        return view('pemkot.rusak', compact('totalbencana','totalkerusakan','totalkorban', 'jumlahKorbansPerBulan', 'jumlahRusaksPerBulan','jumlahBencanasPerBulan','rumahr', 'rumahb','rumaht','kantor','jembatan','publik'));
    }

    public function bencana(){
        $totalbencana = Bencana::whereYear('tanggal', '=', '2023')->count();
        $totalkerusakan = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->sum('rusaks.total');
        $totalkorban = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->count();
                            
        $jumlahBencanasPerBulan = [];
        $jumlahRusaksPerBulan = [];
        $jumlahKorbansPerBulan = [];
        
        $year = 2023; // Tahun yang ingin Anda ambil datanya

        $banjir = Bencana::where('nama', 'Banjir')->whereYear('tanggal', $year)->count();
        $kebakaran = Bencana::where('nama', 'Kebakaran')->whereYear('tanggal', $year)->count();
        $puting = Bencana::where('nama', 'Puting Beliung')->whereYear('tanggal', $year)->count();
        $gempa = Bencana::where('nama', 'Gempa Bumi')->whereYear('tanggal', $year)->count();
        $longsor = Bencana::where('nama', 'Longsor')->whereYear('tanggal', $year)->count();
        $rob = Bencana::where('nama', 'Rob')->whereYear('tanggal', $year)->count();

        // Loop melalui bulan-bulan pada tahun 2023
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // Ambil jumlah data bencanas pada bulan dan tahun tertentu
            $jumlahBencanas = Bencana::whereYear('tanggal', '=', 2023)
                                    ->whereMonth('tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data bencanas ke dalam array
            $jumlahBencanasPerBulan[] = $jumlahBencanas;
    
            // Ambil jumlah data rusaks pada bulan dan tahun tertentu
            $jumlahRusaks = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                                ->whereYear('bencanas.tanggal', '=', 2023)
                                ->whereMonth('bencanas.tanggal', '=', $bulan)
                                ->sum('rusaks.total');
            // Tambahkan jumlah data rusaks ke dalam array
            $jumlahRusaksPerBulan[] = $jumlahRusaks;
    
            // Ambil jumlah data korbans pada bulan dan tahun tertentu
            $jumlahKorbans = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                                    ->whereYear('bencanas.tanggal', '=', 2023)
                                    ->whereMonth('bencanas.tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data korbans ke dalam array
            $jumlahKorbansPerBulan[] = $jumlahKorbans; 
        }                   
        return view('pemkot.bencana', compact('totalbencana','totalkerusakan','totalkorban', 'jumlahKorbansPerBulan', 'jumlahRusaksPerBulan','jumlahBencanasPerBulan','banjir','puting','gempa', 'longsor', 'rob','kebakaran'));
    }

    public function banjir(){
        $bencanas = Bencana::with('kecamatan')
            ->where('nama', 'Banjir')
            ->orderBy('tanggal', 'desc')
            ->orderBy('nama')
            ->orderBy('kecamatan_id')
            ->paginate(20);
        $kecamatans = Kecamatan::all();
        $totalbencana = Bencana::whereYear('tanggal', '=', '2023')->count();
        $totalkerusakan = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->sum('rusaks.total');
        $totalkorban = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                            ->whereYear('bencanas.tanggal', '=', '2023')
                            ->count();
        $data = DB::table('bencanas')
                ->selectRaw('MONTH(tanggal) as bulan, COUNT(*) as jumlah_bencana')
                ->where('nama', 'Banjir')
                ->whereYear('tanggal', 2023)
                ->groupBy('bulan')
                ->pluck('jumlah_bencana', 'bulan')
                ->toArray();
                
        // Inisialisasi array dengan nilai default 0 untuk setiap bulan
        $monthlyData = array_fill(1, 12, 0);
        
        // Mengisi array dengan jumlah bencana sesuai bulan yang ada dalam $data
        foreach ($data as $bulan => $jumlah) {
            $monthlyData[$bulan] = $jumlah;
        }
        $bulankeys = array_values($monthlyData);
        $jumlahBencanasPerBulan = [];
        $jumlahRusaksPerBulan = [];
        $jumlahKorbansPerBulan = [];
    
        // Loop melalui bulan-bulan pada tahun 2023
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // Ambil jumlah data bencanas pada bulan dan tahun tertentu
            $jumlahBencanas = Bencana::whereYear('tanggal', '=', 2023)
                                    ->whereMonth('tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data bencanas ke dalam array
            $jumlahBencanasPerBulan[] = $jumlahBencanas;
    
            // Ambil jumlah data rusaks pada bulan dan tahun tertentu
            $jumlahRusaks = Rusak::join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                                ->whereYear('bencanas.tanggal', '=', 2023)
                                ->whereMonth('bencanas.tanggal', '=', $bulan)
                                ->sum('rusaks.total');
            // Tambahkan jumlah data rusaks ke dalam array
            $jumlahRusaksPerBulan[] = $jumlahRusaks;
    
            // Ambil jumlah data korbans pada bulan dan tahun tertentu
            $jumlahKorbans = Korban::join('bencanas', 'korbans.bencana_id', '=', 'bencanas.bencana_id')
                                    ->whereYear('bencanas.tanggal', '=', 2023)
                                    ->whereMonth('bencanas.tanggal', '=', $bulan)
                                    ->count();
            // Tambahkan jumlah data korbans ke dalam array
            $jumlahKorbansPerBulan[] = $jumlahKorbans; 
        }                   
        return view('pemkot.banjir', compact('totalbencana','totalkerusakan','totalkorban', 'jumlahKorbansPerBulan', 'jumlahRusaksPerBulan','jumlahBencanasPerBulan','bencanas', 'kecamatans','bulankeys'));

    }

    public function kantor(){
        $kerusakans = Rusak::with('bencana')->where('nama', 'Kantor Rusak')->get();
        $bencanas = Bencana::all();
        $data = DB::table('rusaks')
                ->join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                ->selectRaw('MONTH(bencanas.tanggal) as bulan, COUNT(*) as jumlah_kerusakan')
                ->where('rusaks.nama', 'Kantor Rusak')
                ->whereYear('bencanas.tanggal', 2023)
                ->groupBy('bulan')
                ->pluck('jumlah_kerusakan', 'bulan')
                ->toArray();

        // Inisialisasi array dengan nilai default 0 untuk setiap bulan
        $monthlyData = array_fill(1, 12, 0);

        // Mengisi array dengan jumlah kerusakan sesuai bulan yang ada dalam $data
        foreach ($data as $bulan => $jumlah) {
            $monthlyData[$bulan] = $jumlah;
        }
        $nilaibulan = array_values($monthlyData);

        return view('pemkot.kantor', compact('kerusakans','bencanas','nilaibulan'));

    }

    public function korban()
{
    $korbans = Korban::with('bencana')->orderBy('nama')->paginate(15);
    $bencanas = Bencana::all();

    // Get the first item from the paginated results
    $firstItem = $korbans->firstItem();

    return view('pemkot.korban', compact('korbans', 'bencanas', 'firstItem'));
}
}