<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaModel extends Model
{
    use HasFactory;
    protected $table        = "sewa";
    protected $primaryKey   = "id_sewa";
    protected $fillable     = ['id_sewa','id_petugas','id_anggota','id_buku'];

    //relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'id_petugas');
    }

    //relasi ke siswa
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'id_anggota');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'id_buku');
    }
}