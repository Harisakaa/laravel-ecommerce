<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FkController extends Controller
{
    public function index()
    {

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('fakultas.list')->with('title','Daftar Fakultas');
    }

    public function create()
    {
        return view('fakultas.input')->with('title', 'Input Fakultas');
    }

    public function store(Request $r)
    {
        $x = array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'id_dekan' => $r->id_dekan,
        );

        if (\DB::table('fakultas')->where('kode', $r->kode)->exists()) {
            toast('Error: kode sudah terdaftar!', 'error')
                ->background('#ffdddd ')
                ->position('top');

            return redirect()->route('fakultas.create');
        }
        else {

            //disimpan ke dalam database
            $rec = \DB::table('fakultas')
                ->InsertGetId($x);

            Alert::success('Berhasil', 'Data berhasil disimpan.');
            return redirect()->route('fakultas.create')->with('title', 'Data Fakultas');

        }

    }

    public function show($id)
    {

        return view('fakultas.edit')
            ->with('title', 'Edit Data Fakultas')
            ->with('id', $id);
    }

    public function update(Request $r)
    {
        $x = array(
            'id' => $r->id,
            'kode' => $r->kode,
            'nama' => $r->nama,
            'id_dekan' => $r->id_dekan,
        );

        \DB::table('fakultas')
            ->where('id', $r->id)
            ->update($x);

        toast('Data berhasil di edit', 'success')
            ->position('top');

        return redirect()->route('fakultas.index')
            ->with('title', 'Daftar fakultas');
    }


    public function destroy($id)
    {
        \DB::table('fakultas')
            ->where('id', $id)
            ->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');

        return redirect()->route('fakultas.index')
            ->with('title', 'Daftar fakultas');
    }
}
