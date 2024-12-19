<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_kategori = DB::table('kategori')
            ->select('kategori.*')->get();
             return view('kategori.index', compact('ar_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kategori.c_kategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //1. proses validasi data
         $validasi = $request->validate(
            [
                'nama'=>'required|unique:kategori',
            ],
        //2. menampilkan pesan kesalahan
            [
                 'nama.required'=>'Jenis Kategori Wajib Di Isi',
                 'nama.unique'=>'Jenis Kategori Tidak Boleh Sama',
            ],
        );

        DB::table('kategori')->insert(
            [
                'nama'=>$request->nama,
            ]
            );

            //validasi data

        //4. selesai input, arahkan ke /buku (landing page)
        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil ditambahkan. ');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail buku
        $ar_kategori = DB::table('kategori')
            ->select('kategori.*')
            ->where('kategori.id','=',$id)->get();
        return view('kategori.show',compact('ar_kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
        $data = DB::table('kategori')
                        ->where('id','=',$id)->get();
        return view('kategori.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('kategori')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
            ]
        );
        //landing page
        return redirect('/kategori'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //menghapus data
         DB::table('kategori')->where('id',$id)->delete();
         return redirect('/kategori');
    }
}
