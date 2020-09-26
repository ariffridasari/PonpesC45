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
                    <a href="{{URL('admin/algoritma/create')}}" class="btn btn-primary">Add New</a>
                </div>
                <div class="card-body">
                    <div class="basic-data-table">
                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <th>ID Soal</th>
                                <th>Soal</th>
                                {{-- <th>Nama</th> --}}
                                {{-- <th>Alamat</th> --}}
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($datasoal as $soal)
                                <tr>
                                    <td>{{ $soal->id_soal}}</td>
                                    <td>{{ $soal->soal}}</td>
                                    {{-- <td>{{ $post->nama_peserta}}</td> --}}
                                    {{-- <td>{{ $post->alamat}}</td> --}}
                                    {{-- <td><a href="/admin/datasoal/{{ $soal->id_soal}}" class="btn btn-primary
                                    btn-sm" >Detail</a></td> --}}
                                    <td><a href="/admin/datasoal/{{ $soal->id_soal}}" id="detail" class="btn btn-primary btn-sm"
                                            data-toggle="modal" data-id="{{ $soal->id_soal}}" 
                                            data-target="#exampleModalForm">Detail</a></td>
                                </tr>
                                @empty
                                <td colspan="5">Tidak ada data yang ditemukan!</td>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalFormTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalFormTitle">Soal {{ $soal->id_soal}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                {{-- <label for="soal">Soal</label> --}}
                                                <input type="text" class="form-control" id="soal"
                                                    value="{{ $soal->soal}}" readonly>
                                            </div>
                                            {{-- <div class="form-group"> --}}
                                                {{-- <label for="a">Jawaban</label> --}}
                                                {{-- @foreach ($jawaban as $jwb) --}}
                                                {{-- <div class="input-group"> --}}
                                                    {{-- <div class="input-group-append"> --}}
                                                        {{-- <span class="input-group-text">{{ $jwb->value}}</span> --}}
                                                    {{-- </div> --}}
                                                    {{-- <input type="text" class="form-control" id="a" value="{{ $jwb->jawaban}} " readonly><br/> --}}
                                                    {{-- <div class="input-group-append"> --}}
                                                        {{-- @if ($jwb->kunci == 1) --}}
                                                        {{-- <span class="input-group-text"><i class="mdi mdi-check-circle"></i></span>   --}}
                                                        {{-- @endif                                                     --}}
                                                    {{-- </div> --}}
                                                  {{-- </div> --}}
                                                {{-- @endforeach --}}
                                            {{-- </div>   --}}


                                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                        </form>
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary btn-pill">Save Changes</button>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#detail', function(){
         var id_soal = $(this).data('id_soal');
         var soal = $(this).data('soal');
         $('#id_soal').val(id_soal);
         $('#soal').val(soal);
         $('#exampleModalForm').modal('show');
       });
       </script>
  
    @endsection