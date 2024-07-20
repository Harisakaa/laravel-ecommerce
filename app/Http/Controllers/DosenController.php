<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    public function index()
    {

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('dosen.list',) ->with('title','Daftar Dosen');
    }

    public function create()
    {
        return view('dosen.form')->with('title', 'Form Input Dosen');
    }

    public function store(Request $r)
    {
        $x = array(
            'id' => $r->id,
            'nid' => $r->nid,
            'nama' => $r->nama,
            'jenis_kelamin'=>$r->jenis_kelamin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
        );

        if (\DB::table('tbl_dosen')->where('id', $r->id)->exists()) {
            toast('Error: Id sudah terdaftar!', 'error')
                ->background('#ffdddd ')
                ->position('top');
            return redirect()->route('dosen.create');
        }

        $rec = \DB::table('tbl_dosen')
            ->where('id', $r->id)
            ->InsertGetId($x);

        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('dosen.index')->with('title', 'Daftar Dosen');
    }
    public function show($id)
    {
        return view('dosen.edit')
            ->with('title', 'Form Edit Dosen')
            ->with('id', $id);
    }

    public function update(Request $r)
    {
        $x = array(
            'id' => $r->id,
            'nid' => $r->nid,
            'nama' => $r->nama,
            'jenis_kelamin'=>$r->jenis_kelamin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,

        );

        \DB::table('tbl_dosen')
            ->where('id', $r->id)
            ->update($x);

        toast('Data berhasil di edit', 'success')
            ->position('top');

        return redirect()->route('dosen.index')
            ->with('title', 'Daftar Dosen');
    }

    public function destroy($id)
    {
        \DB::table('tbl_dosen')
            ->where('id', $id)
            ->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dosen.index')->with('title', 'List Dosen');
    }

}

