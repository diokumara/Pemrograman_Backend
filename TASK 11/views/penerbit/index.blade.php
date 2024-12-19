@extends('adminlte::page')
@section('tittle','Data Penerbit')

@section('content_header')
    <h1><i class="fa fa-edit"></i> Data Penerbit</h1>
@stop 

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php 
        $ar_judul = ['No','Nama','Alamat','Email','Website','No Telepon','Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md"
    href="{{ route('penerbit.create') }}" role="button"><i class="fa fa-plus"> Tambah Penerbit</i></a><br/><br/>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($ar_penerbit as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->website }}</td>
                    <td>{{ $p->telp }}</td>

                    <td>
                        <form action="{{ route('penerbit.destroy',$p->id )}}" method="POST">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info"
                            href="{{ route('penerbit.show',$p->id )}}"><i class="fa fa-eye"></i> Detail</a>
                            <a class="btn btn-success"
                            href="{{ route('penerbit.edit',$p->id )}}"><i class="fa fa-edit"></i> Edit</a>
                            <button class="btn btn-danger"
                            onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 

@section('js')
    <script>console.log('Hi!');</script>
@stop 