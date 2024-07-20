<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RuangController extends Controller
{
    public function index()
    {

        session(['active_session' => 'ruang']);
        $rec = \DB::table('ruang')->paginate(5);

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('ruang.list')
            ->with(['rec' => $rec, 'title' => 'Daftar Ruangan']);
    }

    public function create()
    {
        return view('ruang.input')->with('title', 'Form Input Ruang');
    }

    public function store(Request $r)
    {
        $x = array (
            'id' => $r->id,
            'kode_ruang' => $r->kode,
            'nama' => $r->nama,
        );
        
        if(\DB::table('ruang')->where('id', $r->id)->exists()) {
            toast('Error: Id sudah terdaftar!', 'error')
            ->background('#ffdddd ')
            ->position('top');
            return redirect()->route('ruang.create');
        }

        $rec = \DB::table('ruang')
            ->where('id', $r->id)
            ->InsertGetId($x);
        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('ruang.create')->with('title', 'Daftar Ruangan');
    }

    public function show($id)
    {
        return view('ruang.edit')
            ->with('title', 'Edit Ruang')
            ->with('id', $id);
    }

    public function update (Request $r) {
        $x = array (
            'id' => $r->id,
            'kode_ruang' => $r->kode,
            'nama' => $r->nama,
        );

        \DB::table('ruang')
        ->where('id', $r->id)
        ->update($x);
        return view('ruang.list')
        ->with('title', 'Daftar Ruang');
    }


    public function destroy($id)
    {
        \DB::table('ruang')
            ->where('id', $id)
            ->delete();
            
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('ruang.index')->with('title', 'Daftar Ruangan');
    }
}
