<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Post;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.siswa.index', ['posts' => $posts]);
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
          'nomor'=>'required',
            'nama'=>'required',
            'alamat'=>'required'
        ]);
                
        Alert::success('Berhasil !', 'Data berhasil tersimpan');
        $post=Post::updateOrCreate(['id' => $request->id],['no_pendaftaran' => $request->nomor, 'nama_peserta' => $request->nama,'alamat'=>$request->alamat]);
        return response()->json(['code'=>200,'data' => $post], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Alert::success('Data Terhapus', 'Data berhasil terhapus');
      $post = Post::find($id)->delete();
      return response()->json(['success'=>'Post Deleted successfully']);
    }
}