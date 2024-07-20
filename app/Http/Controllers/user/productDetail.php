<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productDetail extends Controller
{
    public function detail($id_stok)
    {

        $product = \DB::table('tbstok')
            ->where('tbstok.id_stok', $id_stok)
            ->leftJoin('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->leftJoin('vsaldoakhir', 'vsaldoakhir.id_stok', '=', 'tbstok.id_stok')
            ->leftJoin('satuan', 'tbstok.id_satuan', '=', 'satuan.id_satuan')
            ->leftJoin('mutasi', 'tbstok.id_stok', '=', 'mutasi.id_stok')
            ->select('tbstok.*', 'kategori.nama_kategori as nama_kategori', 'satuan.satuan as nama_satuan', 'mutasi.qty as terjual', 'vsaldoakhir.*')
            ->first();

        $relatedProducts = \DB::table('tbstok')
            ->where('id_kategori', $product->id_kategori)
            ->leftjoin('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->select('tbstok.*', 'kategori.nama_kategori as nama_kategori')
            ->get();


        return view('user.pages.detail', compact('product', 'relatedProducts', ));
    }
}
