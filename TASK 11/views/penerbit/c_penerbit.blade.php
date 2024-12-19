@extends('adminlte::page')
@section('tittle','Form Penerbit')

@section('content_header')
    <h1><i class="fa fa-edit"></i> Form Penerbit</h1><br>
@stop 

@section('content')

<a class="btn btn-danger btn-md"
    href="{{ route('penerbit.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a><br/><br/>

    @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    
   <form method="POST" action="{{ route('penerbit.store') }}">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan 
            oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Alamat</label><input type="text" name="alamat" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="text" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Website</label><input type="text" name="website" class="form-control"/>
        </div>
        <div class="form-group">
            <label>No Telepon</label><input type="text" name="telp" class="form-control"/>
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