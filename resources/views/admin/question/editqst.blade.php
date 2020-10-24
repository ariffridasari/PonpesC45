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
                    <h2>Edit Question</h2>
                </div>
                <div class="card-body">
                {!! Form::open(['action'=>['App\Http\Controllers\Admin\QuestionController@update', $datasoal->id_soal], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('question','Question :')}}
                        {{Form::textarea('question',$datasoal->soal,['class'=>'form-control','placeholder'=>'Question'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('answer','Answer :')}}
                        {{-- {!! Form::select('datajwb', $select, null, ['class'=>'form-control']) !!} --}}
                        @forelse($datajwb as $dtsoal)
                        <div class="form-group">
                            <div class="input-group-prepend">
                                @if ($dtsoal->kunci =='1')
                                {{Form::text('answer',$dtsoal->jawaban,['class'=>'form-control bg-success text-dark','placeholder'=>'answer','readonly'])}}
                                <a href="/admin/answer/{{$dtsoal->id_jwb}}/edit"  class="mb-1 btn btn-outline-primary btn-sm">Edit</a>
                                @else
                                {{Form::text('answer',$dtsoal->jawaban,['class'=>'form-control bg-light text-dark','placeholder'=>'answer','readonly'])}}
                                <a href="/admin/answer/{{$dtsoal->id_jwb}}/edit"  class="mb-1 btn btn-outline-primary btn-sm">Edit</a>
                                @endif
                              </div>
                        </div>
                        @empty
                        <br>
                        <td colspan="5">Jawaban Belum dibuat !</td>
                        @endforelse 
                    </div>


                    {{-- <div class="form-group">
                        {{Form::label('answer','Answer')}}
                        {{Form::text('b',$datasoal->answer->jawaban,['class'=>'form-control','placeholder'=>'B'])}}    
                    </div> --}}
                    {{-- <div class="form-group">
                        {{Form::text('b','',['class'=>'form-control','placeholder'=>'B'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('c','',['class'=>'form-control','placeholder'=>'C'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('d','',['class'=>'form-control','placeholder'=>'D'])}}
                    </div> --}}
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                        {{-- {!!Form::open(['action'=>['App\Http\Controllers\Admin\QuestionController@destroy',$datasoal->id_soal],'method'=>'POST', 'class'=>'text-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!} --}}
                {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection