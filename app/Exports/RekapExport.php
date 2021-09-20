<?php

namespace App\Exports;

use App\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class RekapExport implements FromCollection, WithHeadings
{

    public $absens;
    public $dates;

    public function __construct($datas) {
        $absens = array();
        if ($datas->request->filled('cari1')){
            if ($datas->request->filled('cari2')) {
                $absens = Absen::where('kelas_id', $datas->kelas_id)
                                ->whereBetween('tgl', [$datas->request->cari1, $datas->request->cari2])->orderBy('tgl', 'asc');

                $dates = Absen::where('kelas_id', $datas->kelas_id)
                                ->whereBetween('tgl', [$datas->request->cari1, $datas->request->cari2])->orderBy('tgl', 'asc')
                                ->groupBy('tgl')->pluck('tgl');
            }else{
                $absens = Absen::where([
                    'kelas_id' => $datas->kelas_id,
                    'tgl' => $datas->request->cari1
                ]);

                $dates = Absen::where([
                    'kelas_id' => $datas->kelas_id,
                    'tgl' => $datas->request->cari1
                ])->groupBy('tgl')->pluck('tgl');
            }
        } else {
            $absens = Absen::where([
                'kelas_id' => $datas->kelas_id,
                'tgl' => date('Y-m-d')
            ]);

            $dates = Absen::where([
                'kelas_id' => $datas->kelas_id,
                'tgl' => date('Y-m-d')
            ])->groupBy('tgl')->pluck('tgl');
        }

        $data = array();
        $absens = $absens->groupBy('siswa_id')->get();
        $this->dates = $dates;

        foreach ($absens as $absen) {
            $siswa = [
                'Nama' => $absen->siswa->nama_siswa,
                'No. Induk' => $absen->siswa->nis,
                'Kelas' => $absen->kelas->nama_kelas
            ];

            $collect_dates = new stdClass;

            foreach ($dates as $date) {
                $keterangan = Absen::where([
                    'tgl' => $date,
                    'siswa_id' => $absen->siswa_id
                ])->first();

                $abs = "";
                if ($keterangan->h) {
                    $abs = 'H';
                }elseif ($keterangan->i) {
                    $abs = 'I';
                }elseif ($keterangan->s) {
                    $abs = 'S';
                }else{
                    $abs = 'A';
                }

                $collect_dates->$date = $abs;
            }

            $data[] = array_merge($siswa, (array) $collect_dates);
        }

        $this->absens = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect ($this->absens);
    }
    public function headings(): array
    {
        
        $headers = ['Nama', 'No. Induk', 'Kelas']; 
        return array_merge($headers, $this->dates->toArray());
    }
}
