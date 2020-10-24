@extends('admin.layout')
@section('content')
@include('sweetalert::alert')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-footer text-right">
                <a href="/admin/question" class="mb-1 btn btn-primary"><i class="mdi mdi-keyboard-backspace mr-1"></i> Back</a>
                </div>
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Answer</h2>
                </div>
                <div class="card-body">
                {!! Form::open(['action'=>['App\Http\Controllers\Admin\AnswerController@update', $jawaban->id_jwb], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::textarea('answer',$jawaban->jawaban,['class'=>'form-control','placeholder'=>'Answer'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection