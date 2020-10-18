@extends('admin.layout')
@section('content')
@include('sweetalert::alert')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-footer text-right">
                <a href="/admin/question/question" class="mb-1 btn btn-primary"><i class="mdi mdi-keyboard-backspace mr-1"></i> Back</a>
                </div>
                <div class="card-header card-header-border-bottom">
                    <h2>Create Question</h2>
                </div>
                <div class="card-body">
                {!! Form::open(['action'=>'App\Http\Controllers\Admin\QuestionController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('question','Question')}}
                        {{Form::textarea('question','',['class'=>'form-control','placeholder'=>'Question'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('answer','Answer')}}
                        {{Form::text('a','',['class'=>'form-control','placeholder'=>'A'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('b','',['class'=>'form-control','placeholder'=>'B'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('c','',['class'=>'form-control','placeholder'=>'C'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('d','',['class'=>'form-control','placeholder'=>'D'])}}
                    </div>
                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection