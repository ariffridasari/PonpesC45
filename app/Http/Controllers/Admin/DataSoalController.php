<?php

namespace App\Http\Controllers\Admin;
// namespace App\Models;

use App\Http\Controllers\Controller;
use App\Models\Admin\DataSoal;
use Illuminate\Http\Request;
use App\Models\Admin\Jawaban;
use DB;

class DataSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datasoal =DataSoal::all();
        // return view('admin.soal.datasoal')->with('datasoal',$datasoal);

    //    $dsoal = Jawaban::all();
    //    return view('admin.soal.datasoal')->with('dsoal',$dsoal);
    
    // $user = Jawaban::find(1);
    // var_dump($user->datasoal);
    $datasoal =DataSoal::all();
    // $datajwb= Jawaban::join('data_soal', 'data_soal.id_soal', '=', 'data_jawaban.id_soal')
    //    ->select('data_jawaban.id_soal','data_jawaban.id_jwb','data_jawaban.jawaban','data_jawaban.kunci') 
    //    ->where('data_soal.id_soal')
    //    ->get();

   

       return view('admin.soal.datasoal')->with('datasoal',$datasoal);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'soal'=>'required'
          ]);
                  
          Alert::success('Berhasil !', 'Data berhasil tersimpan');
          $soal=DataSoal::updateOrCreate(['id_soal' => $request->id_soal],['soal' => $request->soal]);
          return response()->json(['code'=>200,'data' => $soal], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\DataSoal  $dataSoal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soal = DataSoal::find($id);
        $datajwb = DB::table('data_soal')
        ->join('data_jawaban', 'data_soal.id_soal', '=', 'data_jawaban.id_soal')
        ->select('data_jawaban.*')
        ->where('data_soal.id_soal',$id)
        // ->where('data_jawaban.id_jwb',$id)
        ->get();
        // return response()->json($datajwb);

    //    var_dump($datajwb);

        return response()->json(['datajwb'=> $datajwb , 'soal'=>$soal]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\DataSoal  $dataSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::success('Data Terhapus', 'Data berhasil terhapus');
        $soal = DataSoal::find($id)->delete();
        return response()->json(['success'=>'Soal Deleted successfully']);

    }
}
