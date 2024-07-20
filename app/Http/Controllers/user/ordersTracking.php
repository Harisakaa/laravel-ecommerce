<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ordersTracking extends Controller
{
    public function ordersTracking()
    {

        $orders = \DB::table('mutasi')
        ->leftjoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
        ->leftjoin('tbjual', 'mutasi.no_bukti', '=', 'tbjual.no_bukti')
        ->where('tbjual.id_pelanggan', Auth::id())
        ->select(
            'mutasi.*',
            'tbjual.*',
            'tbstok.nama_stok',
            'tbstok.foto',
            'tbstok.harga_jual',
        )
        ->orderBy('mutasi.created_at', 'desc')
        ->paginate(5)
        ->groupBy('no_bukti');


        return view('user.pages.orders', compact('orders',));

    }
}
