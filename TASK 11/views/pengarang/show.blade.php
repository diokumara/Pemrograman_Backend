@extends('adminlte::page')
@section('tittle','Detail Pengarang')

@section('content_header')
    <h1><i class="fa fa-edit"></i> Detail Pengarang</h1><br>
@stop 

@section('content')

<a class="btn btn-danger btn-md"
    href="{{ route('pengarang.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a><br/><br/>

    @foreach($ar_pengarang as $b)
   <form>
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan 
            oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" placeholder="{{ $b->nama }}" class="form-control" disabled/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="text" placeholder="{{ $b->email }}" class="form-control" disabled/>
        </div>
        <div class="form-group">
            <label>Nomor HP</label><input type="text" placeholder="{{ $b->hp }}" class="form-control" disabled/>
        </div>
        <div class="form-group">
        <label>Foto</label><input type="text" placeholder="{{ $b->foto }}" class="form-control" disabled/>     
        </div>
        
   </form>
   @endforeach

@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 

@section('js')
    <script>console.log('Hi!');</script>
@stop 