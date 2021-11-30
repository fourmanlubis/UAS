@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>Nama Wisata</h1>
    <hr>
    <form action="{{ isset($wisata)?route("wisata.update",$wisata):route("wisata.store") }}" method="post">
        @isset($wisata)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="kodepos">KODE.POS</label>
            <input type="text" class="form-control @error("nim") is-invalid @enderror" name="nim" value="{{ isset($wisata)?$wisata->kodepos:old("kodepos") }}">
            @error('kodepos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama wisata</label>
            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{ isset($wisata)?$wisata->nama:old("nama") }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat wisata</label>
            <input type="text" class="form-control @error("alamat") is-invalid @enderror" name="alamat" value="{{ isset($mahasiswa)?$mahasiswa->alamat:old("alamat") }}">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        
        <div class="form-group float-right">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection