<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class pelangganData extends Controller
{

    public function showAddressForm()
    {

        $address = \DB::table('tbpelanggan')
            ->where('id_pelanggan', Auth::id())
            ->first();

        return view('profile.partials.addres', compact('address'));
    }

    public function saveAddress(Request $request)
    {

        $request->validate([
            // 'label' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'kode_pos' => 'required|string|max:10',
            'nohp' => 'required|string|max:15',
        ]);


        $existingAddress = \DB::table('tbpelanggan')
            ->where('id_pelanggan', Auth::id())
            ->first();

        if ($existingAddress) {

            \DB::table('tbpelanggan')->where('id_pelanggan', Auth::id())
            ->update([
                // 'label' => $request->label,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'nohp' => $request->nohp,
                'updated_at' => now()
            ]);

        } else {

            \DB::table('tbpelanggan')->insert([
                'id_pelanggan' => Auth::id(),
                // 'label' => $request->label,
                'nama' => Auth::user()->name ,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'nohp' => $request->nohp,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        Alert::success('Sukses', 'Alamat berhasil diupdate');

        return redirect()->back();
    }
}
