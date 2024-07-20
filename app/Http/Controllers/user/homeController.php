<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function productSwiper()
    {

        $showCategories = \DB::table('kategori')->get();


        // $newArrivals = \DB::table('tbstok')
        //     ->leftJoin('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
        //     ->leftJoin('mutasi', 'tbstok.id_stok', '=', 'mutasi.id_stok')
        //     ->select('tbstok.*', 'kategori.nama_kategori', 'mutasi.qty as terjual')
        //     ->groupBy('tbstok.id_stok')
        //     ->orderBy('tbstok.created_at', 'desc')
        //     ->limit(10)
        //     ->get();

        $newArrivals = \DB::table('tbstok')
            ->leftJoin('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->leftJoin('mutasi', function ($join) {
                $join->on('tbstok.id_stok', '=', 'mutasi.id_stok')
                    ->where('mutasi.masuk_keluar', 'Keluar');
            })
            ->select('tbstok.*', 'kategori.nama_kategori', \DB::raw('SUM(mutasi.qty) as terjual'))
            ->groupBy('tbstok.id_stok')
            ->orderBy('tbstok.created_at', 'desc')
            ->limit(10)
            ->get();


        $topSelling = \DB::table('tbstok')
            ->leftJoin('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->leftJoin('mutasi', function ($join) {
                $join->on('tbstok.id_stok', '=', 'mutasi.id_stok')
                    ->where('mutasi.masuk_keluar', 'Keluar');
            })
            ->select('tbstok.*', 'kategori.nama_kategori', \DB::raw('SUM(mutasi.qty) as terjual'))
            ->groupBy('tbstok.id_stok')
            ->orderBy('mutasi.qty', 'desc')
            ->limit(5)
            ->get();

        return view('user.pages.productswiper', compact('newArrivals', 'showCategories', 'topSelling'));
    }

}
