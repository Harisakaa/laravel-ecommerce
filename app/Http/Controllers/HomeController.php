<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class HomeController extends Controller
{
    public function penjumlahanSum()
    {
        return view('penjumlahan')
        ->with('title', 'Penjumlahan');
    }

    public function perkalian()
    {
        return view('perkalian')
        ->with('title', 'Perkalian');
    }

    public function multiply(Request $r)
    {
        $a = $r->a;
        $b = $r->b;
        $hasil = $a * $b;
        return view('perkalian')
            ->with('a', $a)
            ->with('b', $b)
            ->with('hasil', $hasil)
            ->with('title', 'Perkalian');
    }

    public function sum(Request $r)
    {
        $a = $r->a;
        $b = $r->b;
        $hasil = $a + $b;
        return view('penjumlahan')
            ->with('a', $a)
            ->with('b', $b)
            ->with('hasil', $hasil)
            ->with('title', 'Penjumlahan');
    }

    public function berita(Request $request)
    {

        $x = $request->idBrt;
        return view('berita')
            ->with('title', 'Berita')
            ->with('idBrt', $x);
    }

    public function formInputMhs()
    {
        return view('inputmhs')
            ->with('title', 'Input Mahasiswa');
    }

    public function simpanmhs(Request $request)
    {
        $nim = $request->nim;
        $nama = $request->nama;
        $alamat = $request->addres;
        $telp = $request->telp;

        return view('tabelmhs')
            ->with('title', 'Tabel Mahasiswa')
            ->with('nim', $nim)
            ->with('nama', $nama)
            ->with('alamat', $alamat)
            ->with('telp', $telp);
    }

    public function addBarang(Request $r)
    {
        $barang = new Barang;
        $barang->nama = $r->nama;
        $barang->deskripsi = $r->deskripsi;
        $barang->harga = $r->harga;
        $barang->save();

        return view('barang');
    }

    public function tampilBarang() {
        $daftar_barang = Barang::all();
        return view('tampilbarang', compact('daftar_barang'));
    }

    public function inputMatkul(Request $request)
    {
        $id = $request->id;
        $namamatkul = $request->matkul;
        $sks = $request->sks;
        $smt = $request->smt;
        $dosen = $request->dosen;

        return view('inputmatkul')
            ->with('title', 'T')
            ->with('id', $id)
            ->with('matkul', $namamatkul)
            ->with('sks', $sks)
            ->with('smt', $smt)
            ->with('dosen', $dosen)
            ->with('title1', 'Input   Matakuliah')
            ->with('title', 'Tabel Matakuliah');
    }
}
