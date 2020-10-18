@extends('admin.layout')
@section('content')
@include('sweetalert::alert')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-footer text-right">
                <a href="/admin/question/" class="mb-1 btn btn-primary"><i class="mdi mdi-keyboard-backspace mr-1"></i> Back</a>
                </div>
                <div class="card-header card-header-border-bottom">
                    <h2>{{$datasoal->soal}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection