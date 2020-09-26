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
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" id="new-siswa" data-target="#AddModal">Add New</a>
                </div>
                <div class="card-body">
                    <div class="basic-data-table">
                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <th>No</th>
                                {{-- <th>ID</th> --}}
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($posts as $key=>$post)
                                <tr>
                                <td>{{++$key}}</td>
                                    {{-- <td>{{ $post->id}}</td> --}}
                                    <td>{{ $post->no_pendaftaran}}</td>
                                    <td>{{ $post->nama_peserta}}</td>
                                    <td>{{ $post->alamat}}</td>
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="editPost(event.target)" class="btn btn-info btn-sm">Edit</a></td>
                   
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


 {{-- Modal Edit --}}
 <div class="modal fade" id="EditSiswaModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
              <form name="userForm" class="form-horizontal">
                 <input type="hidden" name="id" id="id">
                  <div class="form-group">
                      <label for="nomor" >Nomor Pendaftaran</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Enter title">
                          <span id="nomorError" class="alert-message"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="nama" class="col-sm-2">Nama</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter title">
                          <span id="namaError" class="alert-message"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2">Alamat</label>
                      <div class="col-sm-12">
                          <textarea class="form-control" id="alamat" name="alamat" placeholder="Enter description" rows="4" cols="50">
                          </textarea>
                          <span id="alamatError" class="alert-message"></span>
                      </div>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
          </div>
      </div>
    </div>
  </div>

  <script>
    function editPost(event) {
        var id  = $(event).data("id");
        let _url = `/admin/siswa/${id}`;
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
                } else {
                  $('table tbody').prepend(
                  '<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.nomor+'</td><td>'+response.data.nama+'</td><td>'+response.data.alamat+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
                }
                $('#nomor').val('');
                $('#nama').val('');
                $('#alamat').val('');
  
                $('#EditSiswaModal').modal('hide').trigger("change");
            
              }
          },
          error: function(response) {
            $('#nomorError').text(response.responseJSON.errors.nomor);
            $('#namaError').text(response.responseJSON.errors.nama);
            $('#alamatError').text(response.responseJSON.errors.alamat);
          }
        });
    }

</script>


    @endsection



