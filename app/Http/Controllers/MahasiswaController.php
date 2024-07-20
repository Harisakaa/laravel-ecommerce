<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function index()
    {

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('mahasiswa.list', )->with('title','Daftar Mahasiswa');

    }

    public function create()
    {
        return view('mahasiswa.form')
            ->with('title', 'Form Mahasiswa');
    }

    public function store(Request $r)
    {
        $x = array(
            "nim" => $r->nim,
            "nama" => $r->nama,
            "jenis_kelamin" => $r->jenis_kelamin,
            "alamat" => $r->alamat,
            "nohp" => $r->nohp,
            "id_dosen" => $r->id_dosen,
            "id_prodi" => $r->id_prodi,
        );

        if (\DB::table('tblmhs')->where('nim', $r->nim)->exists()) {
            toast('Error: NIM sudah terdaftar!', 'error')
                ->background('#ffdddd ')
                ->position('top');

            return redirect()->route('mahasiswa.create');
        }

        $rec = \DB::table('tblmhs')
            ->InsertGetId($x);

        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('mahasiswa.create')->with('title', 'Daftar Mahasiswa');
    }

    public function show($id)
    {
        return view('mahasiswa.formedit')
            ->with('title', 'Form Edit Mahasiswa')
            ->with('id', $id);
    }

    public function update(Request $r)
    {
        $x = array(
            'nim' => $r->nim,
            'nama' => $r->nama,
            "jenis_kelamin" => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp
        );

        \DB::table('tblmhs')
            ->where('id', $r->id)
            ->update($x);

        toast('Data berhasil di edit', 'success')
            ->position('top');

        return redirect()->route('mahasiswa.index')
            ->with('title', 'Daftar Mahasiswa');
    }

    public function destroy($id)
    {
        \DB::table('tblmhs')->where('id', $id)->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('mahasiswa.index')->with('title', 'List Mahasiswa');
    }

}
