<?php

namespace App\Http\Controllers;

// use App\Models\BukuModel;
// use App\Models\PetugasModel;
use Illuminate\Http\Request;

//memanggil model SewaModel
use App\Models\SewaModel;

//memanggil model PetugasModel
use App\Models\PetugasModel;

//memanggil model AnggotaModel
use App\Models\AnggotaModel;

//memanggil model BukuModel
use App\Models\BukuModel;

class SewaController extends Controller
{
    //method untuk tampil data peminjaman
    public function sewatampil()
    {
        $datasewa = SewaModel::orderby('id_sewa', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $dataanggota      = AnggotaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_sewa',['sewa'=>$datasewa,'petugas'=>$datapetugas,'anggota'=>$dataanggota,'buku'=>$databuku]);
    }

    //method untuk tambah data peminjaman
    public function sewatambah(Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required'
        ]);

        SewaModel::create([
            'id_petugas' => $request->id_petugas,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku
        ]);
        return redirect('/sewa');
    }

    //method untuk hapus data peminjaman
    public function sewahapus($id_sewa)
    {
        $datasewa=SewaModel::find($id_sewa);
        $datasewa->delete();

        return redirect()->back();
    }

    //method untuk edit data peminjaman
    public function sewaedit($id_sewa, Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required'
        ]);

        $id_sewa = SewaModel::find($id_sewa);
        $id_sewa->id_petugas    = $request->id_petugas;
        $id_sewa->id_anggota      = $request->id_anggota;
        $id_sewa->id_buku      = $request->id_buku;

        $id_sewa->save();

        return redirect()->back();
    }
}