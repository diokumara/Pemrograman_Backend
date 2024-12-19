@extends('adminlte::page')
@section('tittle','Detail Kategori')

@section('content_header')
    <h1><i class="fa fa-tag"></i> Detail Kategori</h1><br>
@stop 

@section('content')

<a class="btn btn-danger btn-md"
    href="{{ route('kategori.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a><br/><br/>

    @foreach($ar_kategori as $b)
   <form>
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan 
            oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Jenis Kategori</label><input type="text" placeholder="{{ $b->nama }}" class="form-control" disabled/>
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