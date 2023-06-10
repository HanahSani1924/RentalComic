<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model AnggotaModel
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    //method untuk tampil data anggota
    public function anggotatampil()
    {
        $dataanggota = AnggotaModel::orderby('id_anggota', 'ASC')
        ->paginate(5);

        return view('halaman/view_anggota',['anggota'=>$dataanggota]);
    }

    //method untuk tambah data anggota
    public function anggotatambah(Request $request)
    {
        $this->validate($request, [
            'nama_anggota' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required'
        ]);

        AnggotaModel::create([
            'nama_anggota' => $request->nama_anggota,
            'pekerjaan' => $request->pekerjaan,
            'telp' => $request->telp
        ]);

        return redirect('/anggota');
    }

     //method untuk hapus data anggota
     public function anggotahapus($id_anggota)
     {
         $dataanggota=AnggotaModel::find($id_anggota);
         $dataanggota->delete();
 
         return redirect()->back();
     }

     //method untuk edit data anggota
    public function anggotaedit($id_anggota, Request $request)
    {
        $this->validate($request, [
            'nama_anggota' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required'
        ]);

        $id_anggota = AnggotaModel::find($id_anggota);
        $id_anggota->nama_anggota      = $request->nama_anggota;
        $id_anggota->pekerjaan  = $request->pekerjaan;
        $id_anggota->telp   = $request->telp;

        $id_anggota->save();

        return redirect()->back();
    }
}