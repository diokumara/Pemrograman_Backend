@extends('adminlte::page')
@section('tittle','Edit pengarang')

@section('content_header')
    <h1><i class="fa fa-book"></i> Edit Pengarang</h1><br>
@stop 

@section('content')

<a class="btn btn-danger btn-md"
    href="{{ route('pengarang.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a><br/><br/>

  

    @foreach($data as $b)
   <form action="{{ route('pengarang.update', $b->id) }}" method="POST" >
        @csrf
        @method('put')
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan 
            oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" value="{{ $b->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="text" name="email" value="{{ $b->email }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Nomor HP</label><input type="text" name="hp" value="{{ $b->hp }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Foto</label><input type="text" name="foto" value="{{ $b->foto }}" class="form-control"/>
        </div>
        
        <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
   </form>
   @endforeach

@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 

@section('js')
    <script>console.log('Hi!');</script>
@stop 