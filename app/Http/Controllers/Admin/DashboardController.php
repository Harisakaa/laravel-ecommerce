<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(request $request)
    {
        //Produk
        $TotalProduk = \DB::table('tbstok')->count();
        $TotalCategories = \DB::table('tbstok')->distinct()->count('id_kategori');

        //Jual
        $TotalJual = \DB::table('mutasi')->where('status', 'OK')->where('masuk_keluar', 'Keluar')->sum('total');
        $TotalProdukTerjual = \DB::table('mutasi')->where('status', 'OK')->where('masuk_keluar', 'Keluar')->distinct()->count('id_stok');

        //pelanggan
        $orderBaru = \DB::table('tbjual')->where('status', 'pending')->count();

        $barangMasuk = \DB::table('mutasi')->where('masuk_keluar', 'Masuk')->count();

        $Data = \DB::table('tbjual')
            ->leftJoin('mutasi', 'mutasi.no_bukti', '=', 'tbjual.no_bukti')
            ->leftJoin('tbpelanggan', 'tbjual.id_pelanggan', '=', 'tbpelanggan.id_pelanggan')
            ->select(
                'tbjual.no_bukti',
                'tbpelanggan.nama',
                'tbjual.status',
                'tbjual.created_at',
                \DB::raw('SUM(mutasi.total) as total')
            )

            ->orderBy('created_at', 'desc')
            ->groupBy('tbjual.no_bukti');

        $selectedDate = $request->input('date');


        if ($selectedDate) {
            $Data->whereDate('tbjual.created_at', $selectedDate);
        }

        $data = $Data->paginate(8);

        $categories = \DB::table('kategori')->get();

        $LatestOrder = $Data->paginate(5);

        return view('admin.dashboard', compact('LatestOrder', 'TotalProduk', 'TotalCategories', 'TotalJual', 'TotalProdukTerjual', 'orderBaru', 'barangMasuk', 'selectedDate'));

    }
}
