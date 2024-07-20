<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class matkulController extends Controller
{
    public function index() {
        return view('matkul.inputmatkul')
        ->with ('title', 'Form Input Matakuliah');
    }

    public function create() {
        return view('matkul.inputmatkul')
        ->with ('title', 'Form Input Matakuliah');
    }

    public function store(Request $r) {
        $x = array (
            "kdmatkul"=> $r->kdmatkul,
            "namamatkul" => $r->matkul,
            "sks"=> $r->sks,
            "semester"=>$r->smt,
            "dosen"=>$r->dosen,
        );

        $pesan =  '';
        $rec = \DB::table('tb_matkul')
        ->where ('kdmatkul', $r->kdmatkul)
        ->first();
        if ($rec == null) {
            \DB::table('tb_matkul')->InsertGetId($x);
        } else {
            $pesan ="Kode Sudah Terdaftar!";
        }
        
        return view('matkul.inputmatkul')
        ->with('title', 'Form Input Dosen')
        ->with('pesan', $pesan);
    }

    // public function show($id) {
    //     return view('mahasiswa.formedit')
    //     ->with('title', 'Form Edit Mahasiswa')
    //     ->with('id', $id);
    // }

    // public function update (Request $r) {
    //     $x = array (
    //         'nim'=> $r->nim,
    //         'nama'=> $r->nama,
    //         'alamat'=>$r->alamat,
    //         'nohp'=>$r->nohp
    //     );

    //     \DB::table('tblmhs')
    //     ->where('id', $r->id)
    //     ->update($x);
    //     return view('mahasiswa.list')
    //     ->with('judul', 'List Mahasiswa');
    // }
}
