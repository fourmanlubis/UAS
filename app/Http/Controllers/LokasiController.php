<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("halaman.lokasi.list",[
            "lokasi" => lokasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("halaman.lokasi.form");
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
            "nama" => "required"
        ]);

        lokasi::create($request->except("_token"));

        return redirect()
                ->route("lokasi.index")
                ->with("info","Berhasil tambah lokasi wisata");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasi $lokasi)
    {
        return view("halaman.lokasi.form",[
            "lokasi" => $lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lokasi $lokasi)
    {
        $lokasi->update($request->except("_token"));

        return redirect()
                ->route("lokasi.index")
                ->with("info","Berhasil update lokasi wisata");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()
            ->route("lokasi.index")
            ->with("info","Berhasil hapus lokasi");
    }
}
