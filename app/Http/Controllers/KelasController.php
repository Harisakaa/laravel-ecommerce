<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function index()
    {
        session(['active_session' => 'kelas']);
        $rec = \DB::table('kelas')->paginate(5);

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('kelas.list')
            ->with(['rec' => $rec, 'title' => 'Daftar Kelas']);
    }

    public function create()
    {
        return view('kelas.input')->with('title', 'Form Input kelas');
    }

    public function store(Request $r)
    {
        $x = array(
            'id' => $r->id,
            'kode' => $r->kode,
            'nama' => $r->nama,
            'idta' => $r->idta,
        );

        if (\DB::table('kelas')->where('id', $r->id)->exists()) {
            toast('Error: Id sudah terdaftar!', 'error')
                ->background('#ffdddd ')
                ->position('top');
            return redirect()->route('kelas.create');
        }

        $rec = \DB::table('kelas')
            ->where('id', $r->id)
            ->InsertGetId($x);

        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('kelas.create')->with('title', 'Daftar Jenjang');
    }

    public function show($id)
    {
        return view('kelas.edit')
            ->with('title', 'Edit kelas')
            ->with('id', $id);
    }

    public function update(Request $r)
    {
        $x = array(
            'id' => $r->id,
            'kode' => $r->kode,
            'nama' => $r->nama,
            'idta' => $r->idta,
        );

        \DB::table('kelas')
            ->where('id', $r->id)
            ->update($x);

            toast('Data berhasil di edit', 'success')
            ->position('top');
        return redirect()->route('kelas.index')
            ->with('title', 'Daftar Kelas');
    }


    public function destroy($id)
    {
        \DB::table('kelas')
            ->where('id', $id)
            ->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('kelas.index')->with('title', 'Daftar Kelas');

    }
}
