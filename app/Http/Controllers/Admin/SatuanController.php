<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $rec = \DB::table('satuan')->paginate(5);
        $title = 'List Satuan';
        return view('admin.satuan.list', compact('rec', 'title'));
    }


    public function store(Request $r)
    {
        $r->validate([
            'satuan' => 'required',
        ]);

            \DB::table('satuan')->insert([
                'satuan' => $r->satuan,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->back();

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function destroy(string $id_satuan)
    {
        \DB::table('satuan')
        ->where('id_satuan', $id_satuan)
        ->delete();

    return redirect()->back();
    }
}
