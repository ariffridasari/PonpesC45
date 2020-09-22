@if ($errors->any())
<div class="alert alert-danger">
    <strong>
        Maaf !
    </strong>
    Terjadi masalah atas data yang anda inputkan. <br /><br />
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif