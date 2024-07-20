<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenjangController extends Controller {
    public function index() {
        session(['active_session' => 'jenjang']);
        $rec = \DB::table('jenjang')->paginate(10);

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('jenjang.list')
            ->with(['rec' => $rec, 'title' => 'Daftar Jenjang']);
    }

    public function create() {
        return view('jenjang.input')->with('title', 'Form Input Jenjang');
    }

    public function store(Request $r) {


        $x = array(
            'id' => $r->id,
            'nama' => $r->nama,
        );

        if(\DB::table('jenjang')->where('id', $r->id)->exists()) {
            toast('Error: Id sudah terdaftar!', 'error')
                ->background('#ffdddd ')
                ->position('top');
            return redirect()->route('jenjang.create');
        }

        $rec = \DB::table('jenjang')
            ->where('id', $r->id)
            ->InsertGetId($x);

        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('jenjang.create')->with('title', 'Daftar Jenjang');
    }

    public function show($id) {
        return view('jenjang.edit')
            ->with('title', 'Edit Jenjang')
            ->with('id', $id);
    }

    public function update(Request $r) {
        $x = array(
            'id' => $r->id,
            'nama' => $r->nama,
        );

        \DB::table('jenjang')
            ->where('id', $r->id)
            ->update($x);

            toast('Data berhasil di edit', 'success')
            ->position('top');
        return redirect()->route('jenjang.index')
            ->with('title', 'Daftar Jenjang');
    }


    public function destroy($id) {
        \DB::table('jenjang')
            ->where('id', $id)
            ->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('jenjang.index')->with('title', 'Daftar Jenjang');
    }
}
