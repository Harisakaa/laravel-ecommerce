<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductGrid extends Controller
{

    public function shopGrid(Request $request, $id = null)
    {
        $categories = \DB::table('kategori')
            ->leftJoin('tbstok', 'kategori.id', '=', 'tbstok.id_kategori')
            ->select('kategori.id', 'kategori.nama_kategori', \DB::raw('count(tbstok.id_stok) as total_product'))
            ->groupBy('kategori.id', 'kategori.nama_kategori')
            ->get();

        $dataProduct = \DB::table('tbstok')
            ->leftJoin('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->leftJoin('mutasi','tbstok.id_stok', '=', 'mutasi.id_stok')
            ->select('tbstok.*', 'kategori.nama_kategori','mutasi.qty')
            ->groupBy('tbstok.id_stok');

        if ($id) {
            $dataProduct->where('tbstok.id_kategori', $id);
        }

        $search = $request->input('search');

        if ($search) {
            $dataProduct->where('tbstok.nama_stok', 'like', '%' . $search . '%')
                       ->orWhere('kategori.nama_kategori', 'like', '%' . $search . '%');
        }


        $sort = $request->input('sort');

        if ($sort == 'terbaru') {
            $dataProduct->orderBy('tbstok.created_at', 'desc');
        } elseif ($sort == 'terlama') {
            $dataProduct->orderBy('tbstok.created_at', 'asc');
        } elseif ($sort == 'tertinggi') {
            $dataProduct->orderByRaw('CAST(harga_jual AS UNSIGNED INTEGER) DESC');
        } elseif ($sort == 'terendah') {
            $dataProduct ->orderByRaw('CAST(harga_jual AS UNSIGNED INTEGER) ASC');


        }

        $keyword = $request->input('keyword');

        if ($keyword) {
            if (strpos($keyword, 'kantor') !== false) {
                $dataProduct->where('tbstok.nama_stok', 'like', '%kantor%');
            } elseif (strpos($keyword, 'sofa') !== false) {
                $dataProduct->where('tbstok.nama_stok', 'like', '%sofa%');
            }
        }


        $products = $dataProduct->paginate(8);

        return view('user.pages.shopgrid', compact('products', 'categories', 'sort', 'id'));
    }

}
