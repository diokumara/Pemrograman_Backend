<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

use APP\Models\pengarang;
class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pengarang = DB::table('pengarang')
            ->select('pengarang.*')->get();
             return view('pengarang.index', compact('ar_pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengarang.c_pengarang');
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
                'email'=>'required|max:50|regex:/(.+)@(.+)\.(.+)/i',
                'hp'=>'required|numeric',
                'foto'=>'required'
            ],
        //2. menampilkan pesan kesalahan
            [
                 'nama.required'=>'Nama Wajib Di Isi',
                 'email.required'=>'Email Wajib Di Isi',
                 'email.regex'=>'Harus berformat email',
                 'hp.required'=>'No HP Wajib Di Isi',
                 'hp.numeric'=>'No HP Wajib Berupa Angka',
                 'foto.required'=>'Foto Wajib Di Isi',
            ],
        );

        DB::table('pengarang')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                'foto'=>$request->foto,
            ]
            );

            //validasi data

        //4. selesai input, arahkan ke /buku (landing page)
        return redirect()->route('pengarang.index')->with('success', 'Data Pengarang berhasil ditambahkan. ');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail buku
        $ar_pengarang = DB::table('pengarang')
            ->select('pengarang.*')
            ->where('pengarang.id','=',$id)->get();
        return view('pengarang.show',compact('ar_pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
        $data = DB::table('pengarang')
                        ->where('id','=',$id)->get();
        return view('pengarang.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('pengarang')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                'foto'=>$request->foto,
            ]
        );
        //landing page
        return redirect('/pengarang'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //menghapus data
         DB::table('pengarang')->where('id',$id)->delete();
         return redirect('/pengarang');
    }
}
