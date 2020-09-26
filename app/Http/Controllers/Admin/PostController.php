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

        // $post = Post::updateOrCreate(['id' => $request->id], [
        //           'nomor' => $request->no_pendaftaran,
        //           'nama' => $request->nama_peserta,
        //           'alamat' => $request->alamat,
        //         ]);

                
        Alert::success('Berhasil', 'ditambahkan ke database');
        // $postId = $request->id;
        $post=Post::updateOrCreate(['id' => $request->id],['no_pendaftaran' => $request->nomor, 'nama_peserta' => $request->nama,'alamat'=>$request->alamat]);
        // if(empty($request->id))
        //     $msg = 'Customer entry created successfully.';
        // else
        //     $msg = 'Customer data is updated successfully';
        
        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);
       
        // return redirect()->route('siswa.index')->with('success',$msg);


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
      $post = Post::find($id)->delete();

      return response()->json(['success'=>'Post Deleted successfully']);
    }
}