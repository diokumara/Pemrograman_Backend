<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use APP\Models\penerbt;
class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_penerbit = DB::table('penerbit')
            ->select('penerbit.*')->get();
             return view('penerbit.index', compact('ar_penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penerbit.c_penerbit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //1. proses validasi data
         $validasi = $request->validate(
            [
                'nama'=>'required',
                'alamat'=>'required',
                'email'=>'required|max:50|regex:/(.+)@(.+)\.(.+)/i',
                'website'=>'required',
                'telp'=>'required|numeric'
            ],
        //2. menampilkan pesan kesalahan
            [
                 'nama.required'=>'Nama Wajib Di Isi',
                 'alamat.required'=>'Alamat Wajib Di Isi',
                 'email.required'=>'Email Wajib Di Isi',
                 'email.regex'=>'Harus berformat email',
                 'website.required'=>'Alamat Website Wajib Di Isi',
                 'telp.required'=>'No HP Wajib Di Isi',
                 'telp.numeric'=>'No HP Wajib Berupa Angka'
            ],
        );

        DB::table('penerbit')->insert(
            [
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'website'=>$request->website,
                'telp'=>$request->telp,
            ]
            );

            //validasi data

        //4. selesai input, arahkan ke /buku (landing page)
        return redirect()->route('penerbit.index')->with('success', 'Data Penerbit berhasil ditambahkan. ');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail buku
        $ar_penerbit = DB::table('penerbit')
            ->select('penerbit.*')
            ->where('penerbit.id','=',$id)->get();
        return view('penerbit.show',compact('ar_penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
        $data = DB::table('penerbit')
                        ->where('id','=',$id)->get();
        return view('penerbit.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('penerbit')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'website'=>$request->website,
                'telp'=>$request->telp,
            ]
        );
        //landing page
        return redirect('/penerbit'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //menghapus data
         DB::table('penerbit')->where('id',$id)->delete();
         return redirect('/penerbit');
    }
}
