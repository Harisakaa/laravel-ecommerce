<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class checkoutController extends Controller
{
    public function showItems()
    {
        $address = \DB::table('tbpelanggan')
            ->where('id_pelanggan', Auth::id())
            ->first();

        $itemsInCart = \DB::table('cart')
            ->where('user_id', Auth::id())
            ->join('tbstok', 'cart.id_stok', '=', 'tbstok.id_stok')
            ->select('cart.*', 'tbstok.nama_stok', 'tbstok.harga_jual', 'tbstok.foto')
            ->get();


        $subtotal = $itemsInCart->sum(function ($item) {
            return $item->harga_jual * $item->qty;
        });

        return view('user.pages.checkout', compact('itemsInCart', 'address', 'subtotal'));
    }



    public function checkoutItems(Request $r)
    {
        $no_bukti = 'J' . Auth::id() . date('YmdHis');


        $itemsInCart = \DB::table('cart')
            ->where('user_id', Auth::id())
            ->join('tbstok', 'cart.id_stok', '=', 'tbstok.id_stok')
            ->select('cart.*', 'tbstok.harga_jual')
            ->get();

        $r->validate([
            'bukti_pembayaran.*' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'pesan' => 'nullable',
        ]);


        $file = $r->file('bukti_pembayaran');
        $fileName = 'bukti_transfer_' . Auth::id() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/bukti_pembayaran', $fileName);

        \DB::table('tbjual')->insert([
            'id_pelanggan' => Auth::id(),
            'no_bukti' => $no_bukti,
            'pesan' => $r->pesan,
            'bukti_pembayaran' => $fileName,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($itemsInCart as $item) {
            \DB::table('mutasi')->insert([
                'no_bukti' => $no_bukti,
                'id_stok' => $item->id_stok,
                'status' => 'pending',
                'qty' => $item->qty,
                'kode' => 'J',
                'masuk_keluar' => 'Keluar',
                'total' => $item->harga_jual * $item->qty,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }

        \DB::table('cart')->where('user_id', Auth::id())->delete();

        sleep(1);

        return redirect()->back()->with('checkout_success', true);
    }


    public function cetakStruk($no_bukti)
    {

        $orderDetails = \DB::table('tbjual')
            ->where('tbjual.no_bukti', $no_bukti)
            ->where('tbjual.id_pelanggan', Auth::id())
            ->leftJoin('tbpelanggan', 'tbjual.id_pelanggan', '=', 'tbpelanggan.id_pelanggan')
            ->select('tbjual.*', 'tbpelanggan.nohp', 'tbpelanggan.alamat')
            ->first();


        $itemsInOrder = \DB::table('mutasi')
            ->where('no_bukti', $no_bukti)
            ->join('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
            ->select('mutasi.*', 'tbstok.nama_stok', 'tbstok.harga_jual')
            ->get();

        $total = $itemsInOrder->sum(function ($item) {
            return $item->harga_jual * $item->qty;
        });

        return view('user.pages.struk', compact('orderDetails', 'itemsInOrder', 'total'));
    }
}



