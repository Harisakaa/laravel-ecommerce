<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class eskulController extends Controller
{
    public function index()
    {
        session(['active_session' => 'fakultas']);
        $rec = \DB::table('eksul')
        ->paginate(5);


        $title = 'Hapus Data?';
        $text = "Apakah anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('eskul.list')->with(['rec' => $rec, 'title' => 'Daftar Fakultas',]);
    }

    public function create()
    {
        return view('eskul.form')->with('title', 'Form Input Eksul');
    }

    public function store(Request $r)
    {
        $x = array(
            'id' => $r->id,
            'nama' => $r->nama,
            'dospem' => $r->dospem,
        );

        if (\DB::table('eksul')->where('nama', $r->nama)->exists()) {
            toast('Error: kode sudah terdaftar!', 'error')
                ->background('#ffdddd ')
                ->position('top');


            return redirect()->route('eskul.create');
        }

        $rec = \DB::table('eksul')
            ->where('id', $r->id)
            ->InsertGetId($x);

        Alert::success('Berhasil', 'Data berhasil disimpan.');
        return redirect()->route('eskul.create')->with('title', 'Data Fakultas');
    }


}
