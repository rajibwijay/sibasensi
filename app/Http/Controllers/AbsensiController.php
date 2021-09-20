<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Siswa;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kelas = Kelas::all();
        return view('absensi.index',compact('data_kelas'));
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
        foreach ($request->get('kelas_id') as $key=>$val) {
            $data = Absen::create([
                'kelas_id' =>$request->kelas_id[$key],
                'siswa_id' =>$request->siswa_id[$key],
                'tgl' => $request->tgl[$key],
                'h'=> ($request->keterangan[$key] == "H" ? 1:0),
                's'=> ($request->keterangan[$key] == "S" ? 1:0),
                'i'=> ($request->keterangan[$key] == "I" ? 1:0),
                'a'=> ($request->keterangan[$key] == "A" ? 1:0)
            ]);
        }
        return redirect('/absensi')->with('status','Berhasil Submit');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $data= Kelas::where('id', $id)->first()->id;

        $siswa = Siswa::where('kelas_id', $data)->get();

        if ($request->filled('cari1')) {
            $absensi = Absen::where('kelas_id', $data)->where('tgl',$request->cari1)->get();
        }
        else {
            $absensi = Absen::where('kelas_id', $data)->where('tgl', date('Y-m-d'))->get();
        }

        return view('absensi.show',compact('data', 'siswa', 'absensi'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$kelas_id)
    {
        $data= Kelas::where('id', $kelas_id)->first()->id;

        $siswa = Siswa::where('kelas_id', $data)->get();

        if ($request->filled('cari1')) {
            $absensi = Absen::where('kelas_id', $data)->where('tgl',$request->cari1)->get();
        }
        else {
            $absensi = Absen::where('kelas_id', $data)->where('tgl', date('Y-m-d'))->get();
        }

        // $absensi = Absen::select(\DB::raw('id,kelas_id, siswa_id, tgl,h,s,i,a',$data))
        // ->where('kelas_id', $kelas_id)->whereDate('tgl', $request->cari1)->groupBy('siswa_id')->get();

        return view('absensi.edit',compact('siswa','absensi','data','kelas_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach ($request->get('id') as $key => $id) {
            $new = Absen::find($request->id[$key])->update([
                'h'=> ($request->keterangan[$key] == "H" ? 1:0),
                's'=> ($request->keterangan[$key] == "S" ? 1:0),
                'i'=> ($request->keterangan[$key] == "I" ? 1:0),
                'a'=> ($request->keterangan[$key] == "A" ? 1:0)
            ]);
            # code...
        }
        return redirect('/absensi')->with('status','Berhasil di Ubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
