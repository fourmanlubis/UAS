<?php

namespace App\Http\Controllers;

use App\Models\wisata;
use Illuminate\Http\Request;

class wisatacontroller extends Controller
{ /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("halaman.wisata.list",[
            "wisata" => wisata::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("halaman.wisata.form");
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
            "kodepos" => "required|max:11",
            "nama" => "required",
            "alamat" => "required"
           
        ]);

        wisata::create($request->except("_token"));

        return redirect()
                ->route("wisata.index")
                ->with("info","Berhasil tambah wisata");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(wisata $wisata)
    {
        return view("halaman.wisata.form",[
            "wisata" => $wisata
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wisata $wisata)
    {
        $mahasiswa->update($request->except("_token"));

        return redirect()
            ->route("wisata.index")
            ->with("info","Berhasil update wisata");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(wisata $wisata)
    {
        $wisata->delete();

        return redirect()->route("wisata.index");
    }
}
