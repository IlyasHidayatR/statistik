<?php

namespace App\Http\Controllers;

use App\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilan table
        //$mahasiswa = DB::table('mahasiswa')->get();
        $mahasiswa = mahasiswa::all();
        $maxSkor = mahasiswa::max('skor');
        //dd($maxSkor);
        $minSkor = mahasiswa::min('skor');
        $rata = mahasiswa::avg('skor');
        
        $frekuensi = mahasiswa::select('skor',DB::raw('count(*) as frekuensi'))
                        ->groupBy('skor')
                        ->get();
        $totalskor = mahasiswa::sum('skor');
        $totalfrekuensi = mahasiswa::count('skor');


        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'max'=>$maxSkor, 'min'=>$minSkor, 'rata'=>$rata,
         'frekuensi'=>$frekuensi, 'totalskor'=>$totalskor, 'totalfrekuensi'=>$totalfrekuensi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa.create');
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
        $mahasiswa = new Mahasiswa;
        //dd ($mahasiswa);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->NIM = $request->NIM;
        $mahasiswa->skor = $request->skor;

        $mahasiswa->save();
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($NIM)
    {
        //
        $mhs=mahasiswa::find($NIM);
        return view('mahasiswa.edit',['mhs'=>$mhs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $NIM)
    {
        //
        $mahasiswa=mahasiswa::find($NIM);
        //dd ($mahasiswa);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->NIM = $request->NIM;
        $mahasiswa->skor = $request->skor;

        $mahasiswa->save();
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($NIM)
    {
        //

       // mahasiswa::destroy($NIM->NIM);
        $mhs=mahasiswa::find($NIM);
        $mhs->delete();
        return redirect('/mahasiswa');
    }
}
