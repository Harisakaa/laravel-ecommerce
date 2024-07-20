<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $rec = \DB::table('kategori')->paginate(5);
        $title = 'List Kategori';
        return view('admin.kategori.list', compact('rec', 'title'));
    }


    public function create()
    {
        return view('admin.kategori.input')->with('title', 'Form Input Kategori');
    }


    public function store(Request $r)
    {
        $r->validate([
            'nama_kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($r->hasFile('gambar')) {
            $file = $r->file('gambar');
            $fileName = 'kategori_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/kategori', $fileName);

            \DB::table('kategori')->insert([
                'nama_kategori' => $r->nama_kategori,
                'gambar' => $fileName,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil disimpan.');
        }

        return back()->withInput()->with('error', 'Terjadi kesalahan saat mengunggah gambar.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
        \DB::table('kategori')
        ->where('id', $id)
        ->delete();

    return redirect()->back();
    }
}
