<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table ='tb_absensi';
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
        # code...
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
        # code...
    }

    //
}
