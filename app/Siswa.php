<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='tb_siswa';
    protected $fillable = ['nama_siswa','nis', "kelas_id"];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
        # code...
    }
    public function absensi()
    {
        return $this->hasMany(Absen::class);
        # code...
    }

    //
}
