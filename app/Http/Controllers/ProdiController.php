<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller {
    public function index() {

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('prodi.list')->with('title','Tabel Data Prodi');
    }

    public function create() {
        return view('prodi.form')->with('title', 'Input Prodi');
    }

    public function store(Request $r) {


        $x = array(
            'idfak' => $r->idfak,
            'kode_prodi' => $r->kode_prodi,
            'nama' => $r->nama,
            'id_jenjang' => $r->id_jenjang,
            'id_kaprodi' => $r->id_kaprodi,
            'tglsk' => $r->tglsk,
            'akreditasi' => $r->akreditasi,
        );


        if(\DB::table('prodi')->where('kode_prodi', $r->kode_prodi)->exists()) {
            toast('Error: Kode sudah terdaftar!', 'error')
            ->background('#ffdddd ')
            ->position('top');
            return redirect()->route('prodi.create');
        } else {

            $rec = \DB::table('prodi')
            ->InsertGetId($x);

        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('prodi.create')->with('title', 'Daftar Prodi');

        }
    }
    
    public function show($id) {
        return view('prodi.edit')
            ->with('title', 'Edit Data Prodi')
            ->with('id', $id);
    }

    public function update(Request $r) {
        $x = array(
            'id' => $r->id,
            'idfak' => $r->idfak,
            'kode_prodi' => $r->kode_prodi,
            'nama' => $r->nama,
            'id_jenjang' => $r->id_jenjang,
            'id_kaprodi' => $r->id_kaprodi,
            'tglsk' => $r->tglsk,
            'akreditasi' => $r->akreditasi,
        );

        \DB::table('prodi')
            ->where('id', $r->id)
            ->update($x);

        toast('Data berhasil di edit', 'success')
            ->position('top');

        return redirect()->route('prodi.index')
            ->with('title', 'Daftar Prodi');
    }

    public function destroy($id) {
        \DB::table('prodi')
            ->where('id', $id)
            ->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('prodi.index')->with('title', 'Daftar Prodi');
    }

}
