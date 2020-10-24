<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DataSoal;
use App\Models\Admin\Jawaban;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasoal=DataSoal::all();
        // return Jawaban::all();
        return view('admin.question.question')->with('datasoal',$datasoal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.createqst'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question'=>'required'
        ]);

        $datasoal= new Datasoal;
        $datasoal->soal =$request ->input('question');
        $datasoal->save();
        Alert::success('Berhasil !', 'Data berhasil tersimpan');
        return redirect('admin/question');
        // return redirect('admin/datasoal')->with('success','Question Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datasoal=Datasoal::find($id);
        // $jawaban=Jawaban::find($id);

 
        $datajwb = DB::table('data_soal')
        ->join('data_jawaban', 'data_soal.id_soal', '=', 'data_jawaban.id_soal')
        // ->select('data_jawaban.jawaban')
        ->select('data_jawaban.jawaban','data_jawaban.kunci')
        ->where('data_soal.id_soal',$id)
        ->orderBy('data_jawaban.kunci','desc')
        // ->where('data_jawaban.id_jwb',$id)
        ->get();

        
        return view('admin.question.showqst')->with('datasoal',$datasoal)->with('datajwb',$datajwb);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datasoal=Datasoal::find($id);
        // $jawaban=Jawaban::find($id);

 
        $datajwb = DB::table('data_soal')
        ->join('data_jawaban', 'data_soal.id_soal', '=', 'data_jawaban.id_soal')
        // ->select('data_jawaban.jawaban')
        ->select('data_jawaban.id_jwb','data_jawaban.jawaban','data_jawaban.kunci')
        ->where('data_jawaban.id_soal',$id)
        ->orderBy('data_jawaban.kunci','desc')
        ->get();

        // $selecta=[];
        // $selectb=[];
        // foreach($datajwb as $dtsoal){
        //     $selecta[$dtsoal->id_jwb] = $dtsoal->jawaban, $dtsoal->kunci;
        // }
       
        // return $datajwb;
        // return $datasoal->answer;
        return view('admin.question.editqst')->with('datasoal',$datasoal)->with('datajwb',$datajwb);
        
        // ->with('selectb',$selectb);
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
        $this->validate($request, [
            'question'=>'required'
        ]);

        $datasoal= Datasoal::find($id);
        $datasoal->soal =$request ->input('question');
        $datasoal->save();

        Alert::success('Berhasil !', 'Data berhasil diperbarui');
        return redirect('admin/question');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $datasoal= Datasoal::find($id);
        // $datasoal->delete();
        // Alert::success('Berhasil !', 'Data berhasil dihapus');
        // return redirect('admin/question');
    }
}
