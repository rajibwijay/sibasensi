<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'tb_kelas';

    protected $fillable = ['nama_kelas','wali_kelas'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
        # code...
    }
    public function absensi()
    {
        return $this->hasMany(Absen::class);
        # code...
    }


}
