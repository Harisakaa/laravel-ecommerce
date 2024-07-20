<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class PenjualanController extends Controller
{
    public function transaksiPenjualan(request $request)
    {
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
            ->groupBy('tbjual.no_bukti')
            ->orderBy('created_at', 'desc');


        $search = $request->input('search');

        if ($search) {
            $Data->where('tbpelanggan.nama', 'like', '%' . $search . '%')
                ->orWhere('tbjual.no_bukti', 'like', '%' . $search . '%');
        }

        $sort = $request->input('urutkan');

        if ($sort == 'pending') {
            $Data->where('tbjual.status', 'pending');
        } elseif ($sort == 'success') {
            $Data->where('tbjual.status', 'verified');
        }

        $transaksiData = $Data->paginate(8);

        return view('admin.penjualan.transaksi', compact('transaksiData'));
    }


    public function detailTransaksi($no_bukti)
    {

        $detailTransaksi = \DB::table('tbjual')
            ->leftJoin('users', 'tbjual.id_pelanggan', '=', 'users.id')
            ->leftJoin('tbpelanggan', 'tbjual.id_pelanggan', '=', 'tbpelanggan.id_pelanggan')
            ->select('tbjual.*', 'tbpelanggan.*', 'users.email')
            ->where('tbjual.no_bukti', $no_bukti)
            ->first();

        $dataProduk = \DB::table('mutasi')
            ->leftJoin('tbjual', 'tbjual.no_bukti', '=', 'mutasi.no_bukti')
            ->leftjoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
            ->select('mutasi.*', 'tbjual.*', 'tbstok.*')
            ->where('tbjual.no_bukti', $no_bukti)
            ->get();

        $subtotal = $dataProduk->sum(function ($item) {
            return $item->harga_jual * $item->qty;
        });

        return view('admin.penjualan.detail-transaksi', compact('detailTransaksi', 'dataProduk', 'subtotal'));
    }



    public function laporanPenjualan(request $request)
    {
        $Data = \DB::table('mutasi')
            ->leftJoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
            ->where('mutasi.masuk_keluar', 'Keluar')
            ->where('mutasi.status', 'OK')
            ->select('mutasi.*', 'tbstok.nama_stok', 'tbstok.harga_jual',\DB::raw('SUM(mutasi.qty) as total_qty'),\DB::raw('SUM(mutasi.qty * tbstok.harga_jual) as total_harga') )
            ->groupBy('tbstok.nama_stok');


        $search = $request->input('search');

        if ($search) {
            $Data->where('tbstok.nama_stok', 'like', '%' . $search . '%');
        }

        $sort = $request->input('urutkan');

        if ($sort == 'tinggi') {
            $Data->orderBy('mutasi.qty', 'desc');
        } elseif ($sort == 'rendah') {
            $Data->orderBy('mutasi.qty', 'asc');
        }else {
            $Data->orderBy('mutasi.created_at', 'desc');
        }

        $transaksiData = $Data->paginate(8);

        $TotalJual = \DB::table('mutasi')->where('status', 'OK')->where('masuk_keluar', 'Keluar')->sum('total');

        return view('admin.penjualan.laporan', compact('transaksiData','TotalJual'));
    }



    public function printPenjualan(Request $request)
    {
        $Data = DB::table('mutasi')
            ->leftJoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
            ->where('mutasi.masuk_keluar', 'Keluar')
            ->where('mutasi.status', 'OK')
            ->select(
                'mutasi.*',
                'tbstok.nama_stok',
                'tbstok.harga_jual',
                DB::raw('SUM(mutasi.qty) as total_qty'),
                DB::raw('SUM(mutasi.qty * tbstok.harga_jual) as total_harga')
            )
            ->groupBy('tbstok.nama_stok', 'mutasi.created_at')
            ->get();

        $TotalJual = $Data->sum('total_harga');
        $currentDate = now()->format('d M Y');

        $pdf = PDF::loadView('admin.penjualan.print', compact('Data', 'TotalJual', 'currentDate'));
        return $pdf->download('penjualan.pdf');
    }




    public function updateTerima(Request $request, $no_bukti)
    {

        \DB::table('tbjual')
            ->where('no_bukti', $no_bukti)
            ->update(['status' => 'verified']);

        \DB::table('mutasi')
            ->where('no_bukti', $no_bukti)
            ->update(['status' => 'OK']);

        return redirect()->back();
    }

}
