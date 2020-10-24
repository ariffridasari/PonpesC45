@extends('admin.layout')
@section('content')
@include('sweetalert::alert')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-footer text-right">
                    <a href="/admin/question/create" class="btn btn-primary"><i class="mdi mdi-plus mr-1"></i>Add New</a>
                    {{-- <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" id="new-siswa" onclick="addPost()">Add New</a> --}}
                </div>
                <div class="card-header card-header-border-bottom">
                    <h2>Data Soal</h2>
                </div>
                <div class="card-body">
                    <div class="basic-data-table">
                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>Soal</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($datasoal as $key=>$soal)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$soal->soal}}</td>
                                    <td><a href="/admin/question/{{$soal->id_soal}}"  class="mb-1 btn btn-outline-info btn-sm">Detail</a>
                                    <a href="/admin/question/{{$soal->id_soal}}/edit"  class="mb-1 btn btn-outline-primary btn-sm">Edit</a></td>
                                </tr>
                                @empty
                                <td colspan="5">Tidak ada data yang ditemukan!</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection