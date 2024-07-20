<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ThnAkademikController extends Controller
{
    public function index()
    {
        session(['active_session' => 'TA']);
        $rec = \DB::table('tahunakademik')->paginate(5);

        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('tahunakademik.list')
            ->with(['rec' => $rec, 'title' => 'Tahun Akademik']);
    }

    public function create()
    {
        return view('tahunakademik.inputThn')->with('title', 'Form Input Tahun Akademik');
    }

    public function store(Request $r)
    {
        $x = array (
            'id' => $r->id,
            'kode' => $r->kode,
            'nama' => $r->nama,
        );

        if (\DB::table('tahunakademik')->where('id', $r->id)->exists()) {
            toast('Error: Id sudah terdaftar!', 'error')
                ->background('#ffdddd ')
                ->position('top');
            return redirect()->route('kelas.create');
        }

        $rec = \DB::table('tahunakademik')
            ->where('id', $r->id)
            ->InsertGetId($x);

        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('tahunakademik.create')->with('title', 'Tahun Akademik');
    }

    public function show($id)
    {
        return view('tahunakademik.edit')
            ->with('title', 'Edit Tahun Akademik')
            ->with('id', $id);
    }

    public function update (Request $r) {
        $x = array (
            'id' => $r->id,
            'kode' => $r->kode,
            'nama' => $r->nama,
        );

        \DB::table('tahunakademik')
        ->where('id', $r->id)
        ->update($x);

        toast('Data berhasil di edit', 'success')
            ->position('top');
        return redirect()->route('tahunakademik.index')
            ->with('title', 'Tahun Akademik');
    }

    public function destroy($id)
    {
        \DB::table('tahunakademik')
            ->where('id', $id)
            ->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('tahunakademik.index')->with('title', 'Tahun Akademik');
    }
}
