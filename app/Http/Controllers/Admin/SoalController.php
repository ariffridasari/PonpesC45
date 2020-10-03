<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Soal;
use Illuminate\Http\Request;
use App\Models\Admin\Jawaban;
use RealRashid\SweetAlert\Facades\Alert;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasoal =Soal::all();
        return view('admin.soal.index')->with('datasoal',$datasoal);
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
          $soal=Soal::updateOrCreate(['id_soal' => $request->id_soal],['soal' => $request->soal]);
          return response()->json(['code'=>200,'data' => $soal], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soal = Soal::find($id);
        return response()->json($soal);
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::success('Data Terhapus', 'Data berhasil terhapus');
        $soal = Soal::find($id)->delete();
        return response()->json(['success'=>'Soal Deleted successfully']);
    }
}
