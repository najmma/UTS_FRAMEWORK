<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Satuan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dt_barang = Barang::all();
        return view('listBarang.index', [
            'dt_barang' => $dt_barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuan = Satuan::all();
        return view('listBarang.create', compact('satuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'unique' => 'Maaf Barang Sudah ada.'
        ];

        $validator = Validator::make($request->all(), [
            'kode_barang' => ['required', 'unique:barangs,kode_barang'],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dt_barang = new Barang;
        $dt_barang->kode_barang = $request->kode_barang;
        $dt_barang->nama_barang = $request->nama_barang;
        $dt_barang->harga_barang = $request->harga_barang;
        $dt_barang->deskripsi_barang = $request->deskripsi_barang;
        $dt_barang->satuan_barang_id = $request->satuan_barang;
        $dt_barang->save();

        return redirect()->route('dt_barangs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dt_barang = Barang::findOrFail($id);
        return view('listBarang.show', compact('dt_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $satuan = Satuan::all();
        $dt_barang = Barang::findOrFail($id);
        return view('listBarang.edit', compact('satuan','dt_barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dt_barang = Barang::find($id);
        $dt_barang->kode_barang = $request->kode_barang;
        $dt_barang->nama_barang = $request->nama_barang;
        $dt_barang->harga_barang = $request->harga_barang;
        $dt_barang->deskripsi_barang = $request->deskripsi_barang;
        $dt_barang->satuan_barang_id = $request->satuan_barang;
        $dt_barang->save();
        return redirect()->route('dt_barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::find($id)->delete();
        return redirect()->route('dt_barangs.index');
    }
}
