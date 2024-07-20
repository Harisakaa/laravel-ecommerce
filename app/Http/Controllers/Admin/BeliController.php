<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BeliController extends Controller
{


    public function index()
    {
        $daftarBeli = DB::table('beli')

            ->leftJoin('mutasi', 'mutasi.no_bukti', '=', 'beli.no_bukti')
            ->leftJoin('pemasok', 'pemasok.id', '=', 'beli.id_pemasok')
            ->leftJoin('tbstok', 'tbstok.id_stok', '=', 'mutasi.id_stok')
            ->select(
                'beli.tanggal as tanggal_beli',
                'pemasok.nama as nama_pemasok',
                'mutasi.*',
                'tbstok.nama_stok as nama_barang',
                'tbstok.harga_beli as harga',
                DB::raw('SUM(mutasi.total) as total_harga'),
            )
            ->orderBy('created_at', 'desc')
            ->groupBy('no_bukti')
            ->get();



        Session::forget(['no_bukti', 'tanggal_beli', 'pemasok']);


        return view('admin.beli.list', compact('daftarBeli'));
    }

    public function detailBeli($no_bukti)
    {

        $dataBeli = DB::table('beli')
            ->leftJoin('mutasi', 'mutasi.no_bukti', '=', 'beli.no_bukti')
            ->leftJoin('tbstok', 'tbstok.id_stok', '=', 'mutasi.id_stok')
            ->select(
                'beli.tanggal as tanggal_beli',
                'mutasi.*',
                'tbstok.nama_stok as nama_barang',
                'tbstok.harga_beli as harga',
                'tbstok.foto as foto_barang',

            )

            ->where('mutasi.no_bukti', $no_bukti)
            ->groupBy('mutasi.id_stok')
            ->get();

            $totalHarga = $dataBeli->sum(function ($item) {
                return $item->qty * $item->harga;
            });

        return view('admin.beli.detail', compact('dataBeli','totalHarga'));
    }



    public function create()
    {

        //Generate No bukti baru
        if (!Session::has('no_bukti')) {
            $no_bukti = 'B-' . time();

            Session::put('no_bukti', $no_bukti);

        } else {
            $no_bukti = Session::get('no_bukti');
        }


        //sweetalert
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin menghapus data?";
        confirmDelete($title, $text);


        $dataBeli = DB::table('beli')
            ->leftJoin('mutasi', 'mutasi.no_bukti', '=', 'beli.no_bukti')
            ->leftJoin('tbstok', 'tbstok.id_stok', '=', 'mutasi.id_stok')
            ->select(
                'beli.tanggal as tanggal_beli',
                'mutasi.*',
                'tbstok.nama_stok as nama_barang',
                'tbstok.harga_beli as harga'
            )

            ->where('mutasi.no_bukti', $no_bukti)
            ->groupBy('mutasi.id_stok')
            ->get();

        $totalHarga = $dataBeli->sum(function ($item) {
            return $item->qty * $item->harga;
        });

        return view('admin.beli.input', compact('no_bukti', 'dataBeli', 'totalHarga'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tanggal_beli' => 'required',
            'pemasok' => 'required',
            'keterangan' => 'nullable',
            'barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
        ]);


        $no_bukti = Session::get('no_bukti');
        $tanggal_beli = $request->input('tanggal_beli');
        $pemasok = $request->input('pemasok');


        $beliExists = DB::table('beli')->where('no_bukti', $no_bukti)->exists();

        if (!$beliExists) {
            DB::table('beli')->insert([
                'no_bukti' => $no_bukti,
                'tanggal' => $tanggal_beli,
                'keterangan' => $request->keterangan,
                'id_pemasok' => $pemasok,
            ]);
        }

        DB::table('mutasi')->insert([
            'no_bukti' => $no_bukti,
            'kode' => 'B',
            'qty' => $request->qty,
           'total' => $request->qty * $request->harga,
            'id_stok' => $request->barang,
            'masuk_keluar' => 'Masuk',
            'status' => 'OK',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Session::put('tanggal_beli', $tanggal_beli);
        Session::put('pemasok', $pemasok);

        return redirect()->back();
    }

    public function delete($id_barang)
    {
        $no_bukti = Session::get('no_bukti');

        DB::table('mutasi')
            ->where('no_bukti', $no_bukti)
            ->where('id_stok', $id_barang)
            ->delete();

        return redirect()->back();
    }
}
