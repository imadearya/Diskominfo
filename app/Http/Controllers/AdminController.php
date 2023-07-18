<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Rusak;
use App\Models\Korban;
use App\Models\Bencana;
use App\Models\Kecamatan;
use App\Models\Penampungan;
use App\Models\Pengungsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{
    public function index(){
        $totalbencana = Bencana::count();
        $totalkerusakan = Rusak::count();
        $totalkorban = Korban::count();
        $totalpengungsi = Pengungsi::count();
        $totalalat = Alat::count();
        $totalpenampungan = Penampungan::count();
        return view('admin.dashboards', compact('totalbencana','totalkerusakan','totalkorban','totalpengungsi','totalalat','totalpenampungan',));
    }

    public function bencana(){
        $bencanas = Bencana::with('kecamatan')->orderBy('tanggal','desc')->orderBy('nama')->orderBy('kecamatan_id')->paginate(20);
        $kecamatans = Kecamatan::all();
        return view('admin.bencana', compact('bencanas','kecamatans'));
    }

    public function kerusakan(){
        $kerusakans = Rusak::with('bencana')
                        ->join('bencanas', 'rusaks.bencana_id', '=', 'bencanas.bencana_id')
                        ->orderBy('bencanas.tanggal', 'desc')
                        ->select('rusaks.*')
                        ->paginate(20);
        $bencanas = Bencana::orderBy('tanggal','desc')->get();
        return view('admin.kerusakan', compact('kerusakans','bencanas'));
    }

    public function korban(){
        $korbans = Korban::with('bencana')->orderBy('nama')->paginate(20);
        $bencanas = Bencana::all();
    
        return view('admin.korban', compact('korbans', 'bencanas'));
    }

    public function pengungsi(){
        $pengungsis = Pengungsi::with('penampungan')->orderBy('penampungan_id')->paginate(20);
        $penampungans = Penampungan::all();
    
        return view('admin.pengungsi', compact('pengungsis', 'penampungans'));
    }

    public function alat()
    {
        $alats = Alat::with('penampungan')->orderBy('penampungan_id')->paginate(20);
        $penampungans = Penampungan::all();
    
        return view('admin.alat', compact('alats', 'penampungans'));
    }

    public function penampungan(){
        $penampungans = Penampungan::with('kecamatan')->orderBy('Nama')->paginate(20);
        $kecamatans = Kecamatan::all();
        return view('admin.penampungan', compact('penampungans', 'kecamatans'));
    }

    
    public function akun(){
        $akuns = User::with('kecamatan')->get();
        $kecamatans = Kecamatan::all();
        return view('admin.akun',compact('akuns','kecamatans'));
    }
    
// BENCANAAAAAAAAAAAAAAA
    public function updateBencana(Request $request, $bencana_id)
{
    $bencana = Bencana::findOrFail($bencana_id);
    $validatedData = Validator::make($request->all(), [
        'bencana_id' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'status' => 'required|string|max:255',
        'kecamatan_id' => 'required|exists:kecamatans,id',
        'deskripsi' => 'required|string',
    ])->validate();

    $existingData = Bencana::where('bencana_id', $validatedData['bencana_id'])
                        ->where('bencana_id', '!=', $bencana->bencana_id)
                        ->first();

    if ($existingData) {
        return redirect('/admin/bencana')->with('errorUpdate', 'Data bencana dengan data yang sama sudah berada pada database!');
    }

    $result = $bencana->update($validatedData);

    if ($result) {
        return redirect('/admin/bencana')->with('successUpdate', 'Data bencana berhasil diupdate!');
    } else {
        return redirect('/admin/bencana')->with('errorUpdate', 'Data bencana gagal diupdate!');
    }
}

    public function destroyBencana($bencana){
        Bencana::destroy($bencana);
        return redirect('/admin/bencana')->with('deleteSuccess','Data bencana berhasil dihapuskan!!');

    }

    public function storeBencana(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'deskripsi' => 'required|string',
        ]);
    
        // Generate bencana_id based on Nama
        $namaBencana = $validatedData['nama'];
        $prefix = '';
    
        if ($namaBencana === 'Banjir') {
            $prefix = 'BJR';
            } else if ($namaBencana === 'Kebakaran') {
            $prefix = 'KBR';
            }else if ($namaBencana === 'Puting Beliung') {
            $prefix = 'PBE';
            }else if ($namaBencana === 'Gempa Bumi') {
            $prefix = 'GPB';
            }else if ($namaBencana === 'Longsor') {
            $prefix = 'LSR';
            }else if ($namaBencana === 'Rob') {
            $prefix = 'ROB';
            }

        // Get the last bencana_id with the same prefix from the database
        $lastRecord = Bencana::where('bencana_id', 'like', $prefix . '-%')
                    ->orderBy('bencana_id', 'desc')
                    ->first();

        $bencanaIdNumber = 1;
        if ($lastRecord) {
            // Extract the number from the last bencana_id and increment it
            $lastBencanaId = explode('-', $lastRecord->bencana_id);
            $bencanaIdNumber = intval(end($lastBencanaId)) + 1;
        }

        $bencanaId = $prefix . '-' . sprintf('%03d', $bencanaIdNumber);
    
        // Add the generated bencana_id to the validated data
        $validatedData['bencana_id'] = $bencanaId;
    
        // Check if record already exists in database
        $existingRecord = Bencana::where('bencana_id', $bencanaId)->first();
    
        if ($existingRecord) {
            // Record already exists, return an error message
            return redirect('/admin/bencana')->with('insertError', 'Data bencana dengan data yang sama sudah ada!!');
        }
    
        // If record does not exist, create a new record
        Bencana::create($validatedData);
    
        return redirect('/admin/bencana')->with('insertSuccess', 'Data bencana berhasil ditambahkan!!');
    
    }

    public function searchBencana(Request $request)
    {
    $searchTerm = $request->input('searchTerm');
    $bencanas = Bencana::where('Nama', 'LIKE', '%'.$searchTerm.'%')->get();

    return view('admin.bencana', compact('bencanas'));
    }


    public function getCategoryBencana(Request $request)
    {
    $status = $request->input('status');

    if ($status) {
        $bencanas = Bencana::where('status', $status)
                   ->with('kecamatan')
                   ->orderBy('tanggal', 'desc')
                   ->orderBy('nama')
                   ->orderBy('kecamatan_id')
                   ->paginate(20);
        $kecamatans = Kecamatan::all();
    } else {
        $bencanas = Bencana::with('kecamatan')->orderBy('tanggal','desc')->orderBy('nama')->orderBy('kecamatan_id')->paginate(20);
        $kecamatans = Kecamatan::all();
    }

    return view('ajax.bencana_ajax', compact('bencanas','kecamatans'));
    }

//KERUSAKANNNNNNNNNNNNNNNNNNNNNNNN
    public function updateKerusakan(Request $request, $id)
    {
        $kerusakan = Rusak::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'total' => 'required|numeric',
            'bencana_id' => 'required|exists:bencanas,bencana_id',
        ]);

        $existingData = Bencana::where('nama', $validatedData['nama'])
                            ->where('total', $validatedData['total'])
                            ->where('bencana_id', $validatedData['bencana_id'])
                            ->first();

        if($existingData){
            return redirect('/admin/kerusakan')->with('errorUpdate', 'Data bencana dengan data yang sama sudah berada pada database!');
        }

        $result = $kerusakan->update($validatedData);
        
        if($result){
            return redirect('/admin/kerusakan')->with('successUpdate', 'Data kerusakan berhasil diupdate!');
        }else{
            return redirect('/admin/kerusakan')->with('errorUpdate', 'Data kerusakan gagal diupdate!');
        }

    }

    public function destroyKerusakan(Rusak $kerusakan){
        Rusak::destroy($kerusakan->id);
        return redirect('/admin/kerusakan')->with('deleteSuccess','Data kerusakan berhasil dihapuskan!!');

    }

    public function storeKerusakan(Request $request )
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'total'=> 'required',
            'bencana_id'=> 'required'
        ]);

            // Check if record already exists in database
        $existingRecord = Rusak::where('nama', $validatedData['nama'])
                                ->where('total', $validatedData['total'])
                                ->where('bencana_id', $validatedData['bencana_id'])
                                ->first();

        if ($existingRecord) {
                // Record already exists, return an error message
            return redirect('/admin/kerusakan')->with('insertError','Data kerusakan dengan data yang sama sudah ada!!');
        }

            // If record does not exist, create a new record
        Rusak::create($validatedData);

        return redirect('/admin/kerusakan')->with('insertSuccess','Data kerusakan berhasil ditambahkan!!');
    }

    public function searchKerusakan(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $kerusakans = Rusak::where('Nama', 'LIKE', '%'.$searchTerm.'%')->get();

        return view('admin.bencana', compact('kerusakans'));
    }
    
//KORBANNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
    public function updateKorban(Request $request, $id)
    {
        $korban = Korban::findOrFail($id);
        $validatedData = $request->validate([
            'NIK' => 'required',
            'nama' => 'required|string|max:255',
            'umur' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'bencana_id' => 'required|exists:penampungans,id',
        ]);

        $existingData = Korban::where('nama', $validatedData['nama'])
                            ->where('bencana_id', $validatedData['bencana_id'])
                            ->first();

        if($existingData){
            return redirect('/admin/korban')->with('errorUpdate', 'Data korban dengan data yang sama sudah berada pada database!');
        }

        $result = $korban->update($validatedData);
        
        if($result){
            return redirect('/admin/korban')->with('successUpdate', 'Data korbankerusakan berhasil diupdate!');
        }else{
            return redirect('/admin/korban')->with('errorUpdate', 'Data korban gagal diupdate!');
        }

    }

    public function destroyKorban(Korban $korban){
        Korban::destroy($korban->id);
        return redirect('/admin/korban')->with('deleteSuccess','Data korban berhasil dihapuskan!!');

    }

    public function storeKorban(Request $request )
    {
        $validatedData = $request->validate([
            'NIK' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'status' => 'required',
            'bencana_id' => 'required'
        ]);

            // Check if record already exists in database
        $existingRecord = Korban::where('nama', $validatedData['nama'])
                                ->where('bencana_id', $validatedData['bencana_id'])
                                ->first();

        if ($existingRecord) {
                // Record already exists, return an error message
            return redirect('/admin/korban')->with('insertError','Data korban dengan data yang sama sudah ada!!');
        }

            // If record does not exist, create a new record
        Korban::create($validatedData);

        return redirect('/admin/korban')->with('insertSuccess','Data korban berhasil ditambahkan!!');
    }

    public function searchKorban(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $korbans = Korban::where('Nama', 'LIKE', '%'.$searchTerm.'%')->get();

        return view('admin.korban', compact('korbans'));
    }

//PENGUNGSIIIIIIIIIIIIIIIIIIII
public function updatePengungsi(Request $request, $id)
{
    $pengungsi = Pengungsi::findOrFail($id);
    $validatedData = $request->validate([
        'NIK' => 'required',
        'nama' => 'required|string|max:255',
        'umur' => 'required|',
        'alamat' => 'required|string|max:255',
        'penampungan_id' => 'required|exists:penampungans,id',
    ]);

    $existingData = Pengungsi::where('NIK', $validatedData['NIK'])
                        ->where('penampungan_id', $validatedData['penampungan_id'])
                        ->where('id', '!=', $pengungsi->id)
                        ->first();

    if($existingData){
        return redirect('/admin/pengungsi')->with('errorUpdate', 'Data korban dengan data yang sama sudah berada pada database!');
    }

    $result = $pengungsi->update($validatedData);
    
    if($result){
        return redirect('/admin/pengungsi')->with('successUpdate', 'Data pengungsi berhasil diupdate!');
    }else{
        return redirect('/admin/pengungsi')->with('errorUpdate', 'Data pengungsi gagal diupdate!');
    }

}

public function destroyPengungsi(Pengungsi $pengungsi){
    Pengungsi::destroy($pengungsi->id);
    return redirect('/admin/pengungsi')->with('deleteSuccess','Data pengungsi berhasil dihapuskan!!');

}

public function storePengungsi(Request $request )
{
    $validatedData = $request->validate([
        'NIK' => 'required',
        'nama' => 'required|string|max:255',
        'umur' => 'required|',
        'alamat' => 'required|string|max:255',
        'penampungan_id' => 'required|exists:penampungans,id',
    ]);

        // Check if record already exists in database
    $existingRecord = Pengungsi::where('NIK', $validatedData['NIK'])
                            ->where('penampungan_id', $validatedData['penampungan_id'])
                            ->first();

    if ($existingRecord) {
            // Record already exists, return an error message
        return redirect('/admin/pengungsi')->with('insertError','Data pengungsi dengan data yang sama sudah ada!!');
    }

        // If record does not exist, create a new record
    Pengungsi::create($validatedData);

    return redirect('/admin/pengungsi')->with('insertSuccess','Data pengungsi berhasil ditambahkan!!');
}

public function searchPengungsi(Request $request)
{
    $searchTerm = $request->input('searchTerm');
    $pengungsis = Pengungsi::where('nama', 'LIKE', '%'.$searchTerm.'%')->get();

    return view('admin.pengungsi', compact('pengingsis'));
}


//PENAMPUNGANNNN
    public function updatePenampungan(Request $request, $id)
    {
        $penampungan = Penampungan::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|',
            'kapasitas' => 'required|numeric',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);

        $existingData = Penampungan::where('nama', $validatedData['nama'])
                            ->where('kecamatan_id', $validatedData['kecamatan_id'])
                            ->where('id', '!=', $penampungan->id)
                            ->first();

        if($existingData){
            return redirect('/admin/penampungan')->with('errorUpdate', 'Data penampungan dengan Nama dan alamat pengungsian yang sama sudah ada di database!');
        }

        $result = $penampungan->update($validatedData);
        
        if($result){
            return redirect('/admin/penampungan')->with('successUpdate', 'Data penampungan berhasil diupdate!');
        }else{
            return redirect('/admin/penampungan')->with('errorUpdate', 'Data penampungan gagal diupdate!');
        }
    }

    public function storePenampungan(Request $request )
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|',
            'kapasitas' => 'required|numeric',
            'kecamatan_id' => 'required|exists:kecamatans,id'
        ]);

        // Check if record already exists in database
        $existingRecord = Penampungan::where('nama', $validatedData['nama'])
                                ->where('kecamatan_id', $validatedData['kecamatan_id'])
                                ->first();

        if ($existingRecord) {
            // Record already exists, return an error message
            return redirect('/admin/penampungan')->with('insertError','Data penampungan dengan Nama dan Alamat Pengungsian yang sama sudah ada!!');
        }

        // If record does not exist, create a new record
        Penampungan::create($validatedData);

        return redirect('/admin/penampungan')->with('insertSuccess','Data penampungan berhasil ditambahkan!!');
    }

    public function destroyPenampungan(Penampungan $penampungan){
        Penampungan::destroy($penampungan->id);
        return redirect('/admin/penampungan')->with('deleteSuccess','Data penampungan berhasil dihapuskan!!');

    }

    public function searchPenampungan(Request $request)
    {
    $searchTerm = $request->input('searchTerm');
    $penampungans = Penampungan::where('Nama', 'LIKE', '%'.$searchTerm.'%')->get();

    return view('admin.penampungan', compact('penampungans'));
    }

//ALATTTTTTTTTTTTTTTTTTTTTTTTTTTT
    public function update(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'kategori' => 'required|',
            'penampungan_id' => 'required|exists:penampungans,id',
        ]);

        $existingData = Alat::where('nama', $validatedData['nama'])
                            ->where('penampungan_id', $validatedData['penampungan_id'])
                            ->where('id', '!=', $alat->id)
                            ->first();

        if($existingData){
            return redirect('/admin/alat')->with('errorUpdate', 'Data alat dengan Nama dan alamat pengungsian yang sama sudah ada di database!');
        }

        $result = $alat->update($validatedData);
        
        if($result){
            return redirect('/admin/alat')->with('successUpdate', 'Data alat berhasil diupdate!');
        }else{
            return redirect('/admin/alat')->with('errorUpdate', 'Data alat gagal diupdate!');
        }
    }

    public function store(Request $request )
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'kategori' => 'required|',
            'penampungan_id' => 'required|',
        ]);
    
        // Check if record already exists in database
        $existingRecord = Alat::where('nama', $validatedData['nama'])
                                ->where('penampungan_id', $validatedData['penampungan_id'])
                                ->first();
    
        if ($existingRecord) {
            // Record already exists, return an error message
            return redirect('/admin/alat')->with('insertError','Data alat dengan Nama dan Alamat Pengungsian yang sama sudah ada!!');
        }
    
        // If record does not exist, create a new record
        Alat::create($validatedData);
    
        return redirect('/admin/alat')->with('insertSuccess','Data alat berhasil ditambahkan!!');
        // $validate = $request->validate([
        //     'Nama' => 'required',
        //     'Jumlah'=> 'required',
        //     'penampungan_id'=> 'required'
        // ]);

        // Alat::create($validate);

        // return redirect('/admin/alat')->with('insertSuccess','Data alat berhasil ditambahkan!!');
    }

    public function destroy(Alat $alat){
        Alat::destroy($alat->id);
        return redirect('/admin/alat')->with('deleteSuccess','Data alat berhasil dihapuskan!!');

    }


    public function searchAlat(Request $request)
    {
    $searchTerm = $request->input('searchTerm');
    $alats = Alat::where('Nama', 'LIKE', '%'.$searchTerm.'%')->get();

    return view('admin.alat', compact('alats'));
    }

    
    public function storeAkun(Request $request )
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|',
            'kecamatan_id' => 'required|exists:kecamatans,id'
        ]);

        $validatedData['foto'] = 'semarang.png';
        // Check if record already exists in database
        $existingRecord = User::where('email', $validatedData['email'])
                                ->where('kecamatan_id', $validatedData['kecamatan_id'])
                                ->first();

        if ($existingRecord) {
            // Record already exists, return an error message
            return redirect('/admin/akun')->with('insertError','Data Akun dengan email yang sama sudah ada!!');
        }

        // If record does not exist, create a new record
        User::create($validatedData);

        return redirect('/admin/akun')->with('insertSuccess','Data Akun berhasil ditambahkan!!');
    }

    public function destroyAkun(User $user){
        User::destroy($user->id);
        return redirect('/admin/akun')->with('deleteSuccess','Data Akun berhasil dihapuskan!!');
    }
    public function updateAkun(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|',
            'kecamatan_id' => 'required|exists:kecamatans,id'
        ]);

        $existingData = User::where('email', $validatedData['email'])
                            ->where('id', '!=', $user->id)
                            ->first();

        if($existingData){
            return redirect('/admin/akun')->with('errorUpdate', 'Data akun dengan email yang sama sudah ada di database!');
        }

        $result = $user->update($validatedData);
        
        if($result){
            return redirect('/admin/akun')->with('successUpdate', 'Data akun berhasil diupdate!');
        }else{
            return redirect('/admin/akun')->with('errorUpdate', 'Data akun gagal diupdate!');
        }
    }
}
