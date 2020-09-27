@extends('admin.layout')
@section('content')
@include('sweetalert::alert')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Data Calon Siswa Baru</h2>
                </div>
                <div class="card-footer text-right">
                    {{-- <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" id="new-siswa" data-target="#AddModal">Add New</a> --}}
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" id="new-siswa" onclick="addPost()">Add New</a>
                </div>
                <div class="card-body">
                    <div class="basic-data-table">
                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th style="width:10%">Nama</th>
                                {{-- <th style="max-width: 10px">Alamat</th> --}}
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($posts as $key=>$post)
                                <tr>
                                <td>{{++$key}}</td>
                                    <td>{{ $post->no_pendaftaran}}</td>
                                    <td>{{ $post->nama_peserta}}</td>
                                    {{-- <td>{{ $post->alamat}}</td> --}}
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="editPost(event.target)" class="btn btn-info btn-sm">Edit</a>
                                        <a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="deletePost(event.target)" class="btn btn-danger btn-sm" id="delete-confirm" >Delete</a>
                                    </td> 
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

<div class="modal fade" id="EditSiswaModal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form>
              @csrf
              <input type="hidden" class="form-control" id="id" name="id" >
                  <div class="form-group">
                      <label for="nomor">Nomor Pendaftaran</label>
                      <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Pendaftaran">
                      <span id="nomorError" class="alert-message"></span>
                    </div>
                  <div class="form-group">
                      <label for="nama">Nama Peserta</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peserta">
                      <span id="namaError" class="alert-message"></span>
                    </div>
                  <div class="form-group">
                      <label for="alamat">Alamat Peserta</label>
                      <textarea class="form-control col-xs-12" rows="7" cols="50" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                      <span id="alamatError" class="alert-message"></span>
                 </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-warning"
                  data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" onclick="createPost()">Simpan</button>
          </div>
          </form>
      </div>
  </div>
</div>


  <script>
      function addPost() {
      $("#id").val('');
      $("#exampleModalLabel").text('Tambah Data');
      $('#EditSiswaModal').modal('show');
    }


    function editPost(event) {
        var id  = $(event).data("id");
        let _url = `/admin/siswa/${id}`;
        $("#exampleModalLabel").text('Update Data Siswa');
        $('#nomorError').text('');
        $('#namaError').text('');
        $('#alamatError').text('');
        
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
              if(response) {
              $("#id").val(response.id);
              $("#nomor").val(response.no_pendaftaran);
              $("#nama").val(response.nama_peserta);
              $("#alamat").val(response.alamat);
              $('#EditSiswaModal').modal('show');
              }
          }
        });
      }


      function createPost() {
      var id = $('#id').val();
      var nomor = $('#nomor').val();
      var nama = $('#nama').val();
      var alamat = $('#alamat').val();
  
      let _url     = `/admin/siswa`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
  
        $.ajax({
          url: _url,
          type: "POST",
          data: {
            id: id,
            nomor: nomor,
            nama: nama,
            alamat: alamat,
            _token: _token
          },
          
          success: function(response) {
              if(response.code == 200) {
                if(id != ""){
                  $("#row_"+id+" td:nth-child(2)").html(response.data.nomor);
                  $("#row_"+id+" td:nth-child(3)").html(response.data.nama);
                  $("#row_"+id+" td:nth-child(4)").html(response.data.alamat);
                  
                } 
                $('#nomor').val('');
                $('#nama').val('');
                $('#alamat').val('');
  
                $('#EditSiswaModal').modal('hide');
                // location.reload();
                
              }
          },
          error: function(response) {
            $('#nomorError').text(response.responseJSON.errors.nomor);
            $('#namaError').text(response.responseJSON.errors.nama);
            $('#alamatError').text(response.responseJSON.errors.alamat);
          }
        });
    }

    
    function deletePost(event) {
      var id  = $(event).data("id");
      let _url = `/admin/siswa/${id}`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
  
        $.ajax({
          url: _url,
          type: 'DELETE',
          data: {
            _token: _token
          },
          success: function(response) {
            $("#row_"+id).remove();
            location.reload(true);
          }
        });
    }

</script>


    @endsection



