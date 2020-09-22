@extends('admin.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Data Calon Siswa Baru</h2>
                </div>
                <div class="card-footer text-right">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Add New</a>
                </div>
                <div class="card-body">
                    <div class="basic-data-table">
                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id}}</td>
                                    <td>{{ $post->no_pendaftaran}}</td>
                                    <td>{{ $post->nama_peserta}}</td>
                                    <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModalForm">Detail</a></td>
                                </tr>
                                @empty
                                <td colspan="5">Tidak ada data yang ditemukan!</td>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Modal Add New Sisa --}}

                        <!-- Modal -->
                        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('siswa.store') }}" method="POST">
                                        @csrf
                                            <div class="form-group">
                                                <label for="nomorPendaftaran">Nomor Pendaftaran</label>
                                                <input type="text" class="form-control" id="nomorPendaftaran" name="nomorPendaftaran" placeholder="Nomor Pendaftaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="namaPeserta">Nama Peserta</label>
                                                <input type="text" class="form-control" id="namaPeserta" name="namaPeserta" placeholder="Nama Peserta">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamatPeserta">Alamat Peserta</label>
                                                <textarea class="form-control col-xs-12" rows="7" cols="50" name="alamatPeserta" placeholder="Alamat"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>






                        {{-- Moddal Detail--}}
                        <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalFormTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalFormTitle">Detail Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            @foreach ($posts as $post)
                                            <div class="form-group">
                                                <label for="nomorPendafataran">Nomor Pendaftaran</label>
                                                <input type="text" class="form-control" id="nomorPendafataran"
                                                    value="{{ $post->no_pendaftaran}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="namaPeserta">Nama Peserta</label>
                                                <input type="text" class="form-control" id="namaPeserta"
                                                    value="{{ $post->nama_peserta}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamatPeserta">Alamat Peserta</label>
                                                <textarea class="form-control col-xs-12" rows="7" cols="50"
                                                    readonly>{{ $post->alamat}}</textarea>
                                            </div>

                                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                            @endforeach
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection