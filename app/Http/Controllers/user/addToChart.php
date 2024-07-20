<?php
namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class addToChart extends Controller
{

    public function addToCart(Request $r, $id_stok)
    {

        $product = \DB::table('tbstok')
        ->where('id_stok', $id_stok)->first();

        if (!$product) {

            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        $itemInCart = \DB::table('cart')
        ->where('user_id', Auth::id())->where('id_stok', $id_stok)->first();

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



    public function showCart()
    {
        $cartItems = \DB::table('cart')
            ->where('user_id', Auth::id())
            ->leftjoin('tbstok', 'cart.id_stok', '=', 'tbstok.id_stok')
            ->select('cart.*', 'tbstok.nama_stok', 'tbstok.harga_jual', 'tbstok.foto')
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->harga_jual * $item->qty;
        });

        return view('user.pages.cart', compact('cartItems', 'subtotal'));
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
