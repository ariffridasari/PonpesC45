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
                <div class="card-body">
                <div class="form-group">
                    {{Form::label('answer','Answer :')}}
                    {{-- {!! Form::select('datajwb', $select, null, ['class'=>'form-control']) !!} --}}
                    @forelse($datajwb as $dtsoal)
                    <div class="form-group">
                        <div class="input-group-prepend">
                            @if ($dtsoal->kunci =='1')
                            {{Form::text('answer',$dtsoal->jawaban,['class'=>'form-control bg-success text-dark','placeholder'=>'answer','readonly'])}}
                            @else
                            {{Form::text('answer',$dtsoal->jawaban,['class'=>'form-control bg-light text-dark','placeholder'=>'answer','readonly'])}}
                            {{-- <div class="input-group-text">Null</div> --}}
                            @endif
                            
                          </div>
                    </div>
                    @empty
                        <br>
                        <td colspan="5">Jawaban Belum dibuat !</td>
                    @endforelse 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection