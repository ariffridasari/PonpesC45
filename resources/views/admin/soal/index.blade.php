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
                    <h2>Data Soal</h2>
                </div>
                <div class="card-footer text-right">
                    {{-- <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" id="new-siswa" data-target="#AddModal">Add New</a> --}}
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" id="new-soal" onclick="addSoal()">Add New</a>
                </div>
                <div class="card-body">
                    <div class="basic-data-table">
                        <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>Soal</th>
                                {{-- <th style="width:10%">Nama</th> --}}
                                {{-- <th style="max-width: 10px">Alamat</th> --}}
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($datasoal as $key=>$soal)
                                <tr>
                                <td>{{++$key}}</td>
                                    <td>{{ $soal->soal}}</td>
                                    {{-- <td>{{ $soal->id_soal}}</td> --}}
                                    {{-- <td>{{ $post->alamat}}</td> --}}
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{ $soal->id_soal }}" onclick="editSoal(event.target)" class="btn btn-info btn-sm">Edit</a>
                                        <a href="javascript:void(0)" data-id="{{ $soal->id_soal }}" onclick="deleteSoal(event.target)" class="btn btn-danger btn-sm" id="delete-confirm" >Delete</a>
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

<div class="modal fade" id="ModalSoal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Soal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form>
              @csrf
              <input type="text" class="form-control" id="id_soal" name="id_soal" >
                  <div class="form-group">
                      <label for="soal">Soal</label>
                      <input type="text" class="form-control" id="soal" name="soal" placeholder="Soal">
                      <span id="soalError" class="alert-message"></span>
                    </div>
                  {{-- <div class="form-group">
                      <label for="nama">Nama Peserta</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peserta">
                      <span id="namaError" class="alert-message"></span>
                    </div>
                  <div class="form-group">
                      <label for="alamat">Alamat Peserta</label>
                      <textarea class="form-control col-xs-12" rows="7" cols="50" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                      <span id="alamatError" class="alert-message"></span>
                 </div> --}}
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-warning"
                  data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" onclick="createSoal()">Simpan</button>
          </div>
          </form>
      </div>
  </div>
</div>

<script>
    function addSoal() {
      $("#id_soal").val('');
      $("#soal").val('');
      $("#exampleModalLabel").text('Tambah Data Soal');
      $('#ModalSoal').modal('show');
    }

    function createSoal() {
      var id_soal = $('#id_soal').val();
      var soal = $('#soal').val();
  
      let _url     = `/admin/soal`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
  
        $.ajax({
          url: _url,
          type: "POST",
          data: {
            id_soal: id_soal,
            soal: soal,
            _token: _token
          },
          
          success: function(response) {
              if(response.code == 200) {
                if(id_soal != ""){
                  $("#row_"+id_soal+" td:nth-child(2)").html(response.data.soal);
                  
                } 
                $('#soal').val('');
  
                $('#ModalSoal').modal('hide');
                // location.reload();
                
              }
          },
          error: function(response) {
            $('#soalError').text(response.responseJSON.errors.soal);
          }
        });
    }

    function editSoal(event) {
        var id_soal  = $(event).data("id");
        let _url = `/admin/soal/${id_soal}`;
        $("#exampleModalLabel").text('Update Data Soal');
        $('#soalError').text('');
        
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
              if(response) {
              $("#id_soal").val(response.id_soal);
              $("#soal").val(response.soal);
              $('#ModalSoal').modal('show');
              }
          }
        });
      }

      function deleteSoal(event) {
      var id  = $(event).data("id");
      let _url = `/admin/soal/${id}`;
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