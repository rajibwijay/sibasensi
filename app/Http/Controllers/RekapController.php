<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Kelas;
use App\Siswa;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;
use stdClass;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('rekap.index', compact('kelas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $kelas_id)
    {

        if ($request->filled('cari1')){
            if ($request->filled('cari2')) {
                $absen = Absen::select(\DB::raw('kelas_id, siswa_id, tgl, sum(h) as h, sum(s) as s, sum(i) as i, sum(a) as a'))
                ->where('kelas_id', $kelas_id)->whereBetween('tgl', [$request->cari1, $request->cari2] )->groupBy('siswa_id')->get();

            }else{
                $absen = Absen::select(\DB::raw('kelas_id, siswa_id, tgl, sum(h) as h, sum(s) as s, sum(i) as i, sum(a) as a'))
                ->where('kelas_id', $kelas_id)->whereDate('tgl', $request->cari1)->groupBy('siswa_id')->get();
            }
        } else {
            $absen = Absen::select(\DB::raw('kelas_id, siswa_id, tgl, sum(h) as h, sum(s) as s, sum(i) as i, sum(a) as a'))
            ->where('kelas_id', $kelas_id)->whereDate('tgl', date('Y-m-d') )->groupBy('siswa_id')->get();
        }
        return view('rekap.show', compact('absen','kelas_id'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit($rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy($rekap)
    {
        //
    }
    public function export(Request $request, $kelas_id)
    {
        $data = new stdClass;
        $data->request = $request;
        $data->kelas_id = $kelas_id;

        return Excel::download(new RekapExport($data), 'RekapExcel.xlsx');
    }
    public function showpdf(Request $request,$kelas_id)
    {
        if ($request->filled('cari1')){
            if ($request->filled('cari2')) {
                $absen = Absen::select(\DB::raw('kelas_id, siswa_id, tgl, sum(h) as h, sum(s) as s, sum(i) as i, sum(a) as a'))
                ->where('kelas_id', $kelas_id)->whereBetween('tgl', [$request->cari1, $request->cari2] )->groupBy('siswa_id')->get();

            }else{
                $absen = Absen::select(\DB::raw('kelas_id, siswa_id, tgl, sum(h) as h, sum(s) as s, sum(i) as i, sum(a) as a'))
                ->where('kelas_id', $kelas_id)->whereDate('tgl', $request->cari1)->groupBy('siswa_id')->get();
            }
        } else {
            $absen = Absen::select(\DB::raw('kelas_id, siswa_id, tgl, sum(h) as h, sum(s) as s, sum(i) as i, sum(a) as a'))
            ->where('kelas_id', $kelas_id)->whereDate('tgl', date('Y-m-d') )->groupBy('siswa_id')->get();
           
        }
        return view('rekap.pdf', compact('absen','kelas_id'));
    }
}
