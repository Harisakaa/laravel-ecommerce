<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class home extends Controller
{
    public function productSwiper()
    {

        $newArrivals = \DB::table('tbstok')
            ->join('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->select('tbstok.*', 'kategori.nama_kategori')
            ->orderBy('tbstok.created_at', 'desc')
            ->get();

        $products = \DB::table('tbstok')
            ->join('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->select('tbstok.*', 'kategori.nama_kategori', )
            ->get();


        return view('shop.productall', compact('newArrivals', 'products', 'counts'));
    }


    public function detail($id_stok)
    {

        $product = \DB::table('tbstok')
            ->where('id_stok', $id_stok)
            ->join('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->join('satuan', 'tbstok.id_satuan', '=', 'satuan.id_satuan')
            ->select('tbstok.*', 'kategori.nama_kategori as nama_kategori', 'satuan.satuan as nama_satuan')
            ->first();

        $relatedProducts = \DB::table('tbstok')
            ->where('id_kategori', $product->id_kategori)
            ->join('kategori', 'tbstok.id_kategori', '=', 'kategori.id')
            ->select('tbstok.*', 'kategori.nama_kategori as nama_kategori')
            ->get();


        return view('shop.detail', compact('product', 'relatedProducts'));
    }

    public function shopGrid()
    {

        $product = \DB::table('tbstok')
         ->get();

        return view('shop.shopgrid', compact('product'));
    }


    public function showCart()
    {
        $cartItems = \DB::table('cart')
            ->where('user_id', Auth::id())
            ->join('tbstok', 'cart.id_stok', '=', 'tbstok.id_stok')
            ->select('cart.*', 'tbstok.nama_stok', 'tbstok.harga_jual', 'tbstok.foto')
            ->get();

        $subtotal = 0;

        $subtotal = $cartItems->sum(function ($item) {
            return $item->harga_jual * $item->qty;
        });

        return view('shop.cart', compact('cartItems', 'subtotal'));
    }



    public function addToCart(Request $r, $id_stok)
    {

        $product = \DB::table('tbstok')->where('id_stok', $id_stok)->first();

        if (!$product) {

            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        $itemInCart = \DB::table('cart')->where('user_id', Auth::id())->where('id_stok', $id_stok)->first();

        $qty = $r->input('qty', 1);

        if ($itemInCart) {

            \DB::table('cart')
                ->where('user_id', Auth::id())
                ->where('id_stok', $id_stok)
                ->increment('qty', $qty);

        } else {

            \DB::table('cart')->insert([
                'user_id' => Auth::id(),
                'id_stok' => $id_stok,
                'qty' => $qty,
            ]);
        }
        return redirect()->back();
    }


    public function updateCart(Request $r, $id_stok)
    {
        $newQuantity = $r->input('qty');

        \DB::table('cart')
            ->where('user_id', Auth::id())
            ->where('id_stok', $id_stok)
            ->update([
                'qty' => $newQuantity
            ]);

        return redirect()->back();
    }


    public function deleteProduct(Request $r)
    {
        if ($r->id_stok) {
            \DB::table('cart')
                ->where('user_id', Auth::id())
                ->where('id_stok', $r->id_stok)
                ->delete();

            return redirect()->back();
        }
    }

}
