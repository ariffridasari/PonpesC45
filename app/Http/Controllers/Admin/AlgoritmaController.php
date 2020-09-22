<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Algoritma;
use App\Models\Admin\Jawaban;
use DB;

class AlgoritmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // // $datasoal =Algoritma::all();
        // $datasoal = DB::table('data_soal')
        // ->select('data_soal.id_soal','data_soal.soal')
        // ->join('data_jawaban','data_jawaban.id_soal','=','data_soal.id_soal')
        // ->distinct('data_soal.id_soal')
        // ->get();
        // $jawaban = DB::table('data_jawaban')
        // ->select('data_jawaban.jawaban','mst_param.value','data_jawaban.kunci')
        // ->join('data_soal','data_jawaban.id_soal','=','data_soal.id_soal')
        // ->join('mst_param','mst_param.key','=','data_jawaban.kode')
        // ->get();
        
        // return view('admin.algoritma.index')->with('datasoal',$datasoal)->with('jawaban',$jawaban);
        
        $datasoal =Algoritma::all();
        return view('admin.algoritma.index')->with('datasoal',$datasoal);
        


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Algoritma::find($id);
        return view('admin.siswa.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
