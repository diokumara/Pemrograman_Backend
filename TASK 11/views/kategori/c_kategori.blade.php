@extends('adminlte::page')
@section('tittle','Form Kategori')

@section('content_header')
    <h1><i class="fa fa-tag"></i> Form Kategori</h1><br>
@stop 

@section('content')

<a class="btn btn-danger btn-md"
    href="{{ route('kategori.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a><br/><br/>

    @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    
   <form method="POST" action="{{ route('kategori.store') }}">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan 
            oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Jenis Kategori</label><input type="text" name="nama" class="form-control"/>
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