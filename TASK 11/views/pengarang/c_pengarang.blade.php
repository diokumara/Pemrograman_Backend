@extends('adminlte::page')
@section('tittle','Form Pengarang')

@section('content_header')
    <h1><i class="fa fa-edit"></i> Form Pengarang</h1><br>
@stop 

@section('content')

<a class="btn btn-danger btn-md"
    href="{{ route('pengarang.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a><br/><br/>

    @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    
   <form method="POST" action="{{ route('pengarang.store') }}">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan 
            oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="text" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Nomor HP</label><input type="text" name="hp" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Foto</label><input type="text" name="foto" class="form-control"/>
        </div>
        
        <button type="submit" class="btn btn-info"><i class="fa fa-floppy-disk">Simpan</i></button>
   </form>
@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 

@section('js')
    <script>console.log('Hi!');</script>
@stop 