<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StokProdukController extends Controller
{
    public function index(request $request)
    {
        $rec = \DB::table('tbstok')
            ->leftjoin('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->leftjoin('satuan', 'tbstok.id_satuan', '=', 'satuan.id_satuan')
            ->select('tbstok.*', 'kategori.nama_kategori as nama_kategori', 'satuan.satuan as nama_satuan')
            ->orderBy('created_at', 'desc');

        $selectedCategory = $request->input('category');
        $selectedDate = $request->input('date');

        if ($selectedCategory) {
            $rec->where('kategori.nama_kategori', $selectedCategory);
        }
        if ($selectedDate) {
            $rec->whereDate('tbstok.created_at', $selectedDate);
        }

        $data = $rec->paginate(8);

        $categories = \DB::table('kategori')->get();

        $title = 'List Stok Produk';


        return view('admin.produk.list', compact('data', 'categories', 'selectedCategory', 'selectedDate', 'title'));

    }

    public function create()
    {
        return view('admin.produk.input')
            ->with('title', 'Form Input Stok Barang');
    }


    public function store(Request $r)
    {


        $r->validate([
            'foto.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);

        $images = [];

        foreach ($r->file('foto') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('fotoProduk'), $imageName);
            $images[] = $imageName;
        }

        $data = [
            'kode_stok' => $r->kode_stok,
            'nama_stok' => $r->nama_stok,
            'saldo_awal' => $r->saldo_awal,
            'harga_beli' => $r->harga_beli,
            'harga_jual' => $r->harga_jual,
            'harga_modal' => $r->harga_modal,
            'id_kategori' => $r->kategori,
            'jenis_ruangan' => $r->ruangan,
            'id_satuan' => $r->satuan,
            'deskripsi' => $r->deskripsi,
            'pajang' => $r->pajang,
            'foto' => implode(",", $images),
            'created_at' => now(),
            'updated_at' => now()
        ];


        if (\DB::table('tbstok')->where('kode_stok', $r->kode_stok)->exists()) {
            return redirect()->route('stok.create')->with('error', 'Kode stok sudah ada.');
        }
        \DB::table('tbstok')->insertGetId($data);

        Alert::success('Sukses', 'Berhasil Menambahkan Produk');

        return redirect()->back();
    }


    public function show(string $id_stok)
    {
        return view('admin.produk.edit')
            ->with('title', 'Form Edit Mahasiswa')
            ->with('id_stok', $id_stok);
    }


    public function edit(string $id)
    {

    }


    public function update(Request $r, string $id_stok)
    {

        $produk = \DB::table('tbstok')
            ->where('id_stok', $id_stok)
            ->first();

        $r->validate([
            'foto.*' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);

        $data = array(
            'kode_stok' => $r->kode_stok,
            'nama_stok' => $r->nama_stok,
            'saldo_awal' => $r->saldo_awal,
            'harga_beli' => $r->harga_beli,
            'harga_jual' => $r->harga_jual,
            'harga_modal' => $r->harga_modal,
            'deskripsi' => $r->deskripsi,
            'pajang' => $r->pajang,
        );

        $images = [];

        if ($r->hasFile('foto')) {
            if ($produk->foto) {
                $oldFotos = explode(",", $produk->foto);
                foreach ($oldFotos as $oldfoto) {
                    $oldImagePath = public_path('fotoProduk/' . $oldfoto);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            foreach ($r->file('foto') as $file) {
                $imageName = 'foto_produk_' . $r->kode_stok . '_' . time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('fotoProduk'), $imageName);
                $images[] = $imageName;
            }

            $data['foto'] = implode(",", $images);
        }

        \DB::table('tbstok')
            ->where('id_stok', $id_stok)
            ->update($data);

         Alert::success('Sukses', 'Berhasil Menambahkan Produk');
        return redirect()->route('stok.index');
    }



    public function destroy(string $id_stok)
    {
        $produk = \DB::table('tbstok')
            ->where('id_stok', $id_stok)
            ->first();
        $foto = $produk->foto;

        \DB::table('tbstok')->where('id_stok', $id_stok)->delete();

        if ($foto && file_exists(public_path('fotoProduk/' . $foto))) {
            unlink(public_path('fotoProduk/' . $foto));
        }

        return redirect()->route('stok.index');
    }
}
