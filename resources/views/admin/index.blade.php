@extends('admin.layout')
@section('content')
<div class="content">
<div class="row">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <h2 class="mb-1">71,503</h2>
          <p>Total Calon Siswa</p>
          <div class="chartjs-wrapper">
            <canvas id="barChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection