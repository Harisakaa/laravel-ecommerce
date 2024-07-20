<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemasokController extends Controller
{

    public function index()
    {
        $rec = \DB::table('pemasok')->paginate(5);
        $title = 'Daftar Pemasok';
        return view('admin.pemasok.list', compact('rec', 'title'));
    }


    public function create()
    {
        return view('admin.pemasok.input')->with('title', 'Form Input Pemasok');
    }

    public function store(Request $r)
    {
        $data = array(
            'kode_pemasok' => $r->kode_pemasok,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
        );

        if(\DB::table('pemasok')->where('kode_pemasok', $r->kode_pemasok)->exists()) {
            return redirect()->route('pemasok.create');
        } else {
          \DB::table('pemasok')
            ->InsertGetId($data);
        return redirect()->route('pemasok.index');

        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \DB::table('pemasok')
            ->where('id', $id)
            ->delete();

        return redirect()->route('pemasok.index');
    }
}
