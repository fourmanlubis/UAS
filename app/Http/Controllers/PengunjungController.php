<?php

namespace App\Http\Controllers;

use App\Models\pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("halaman.pengunjung.list",[
            "pengunjung" => pengunjung::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("halaman.pengunjung.form",[
            "wisata" => \App\Models\wisata::all(),
            "lokasi" => \App\Models\lokasi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "kodepos" => "required",
            "lokasi_id" => "required",
            "pengunjung" => "required|integer|between:0,100"
        ]);

        pengunjung::create($request->except("_token"));

        return redirect()
                ->route("pengunjung.index")
                ->with("info","jumlah pengunjung");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function show(pengunjung $pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit(pengunjung $pengunjung)
    {
        return view("halaman.pengunjung.form",[
            "wisata" => \App\Models\wisata::all(),
            "lokasi" => \App\Models\lokasi::all(),
            "pengunjung" => $pengunjung
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengunjung $pe)
    {
        $pengunjung->update($request->except("_token"));

        return redirect()
                ->route("pengunjung.index")
                ->with("info","Berhasil update jumlah pengunjung");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengunjung $pengunjung)
    {
        $pengunjung->delete();

        return redirect()
            ->route("pengunjung.index")
            ->with("info","Berhasil hapus jumlah pengunjung");
    }
}
