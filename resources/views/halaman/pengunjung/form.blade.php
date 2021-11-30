@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>jumlah pengunjung</h1>
    <hr>
    <form action="{{ isset($pengunjung)?route("pengunjung.update",$pengunjung):route("pengunjung.store") }}" method="post">
        @isset ($pengunjung)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="kodepos">KODE.POS</label>
            <select name="kodepos" id="kodepos" class="form-control @error("nim") is-invalid @enderror">
            @foreach ($wisata as $item)
                <option value="{{ $item->kodepos }}" {{ isset($pengunjung) && $pengunjung->kodepos==$item->kodepos?"selected":"" }}>{{ $item->nama }}</option>
            @endforeach
            </select>
            @error('kodepos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lokasi">lokasi</label>
            <select name="lokasi_id" id="lokasi" class="form-control @error("lokasi_id") is-invalid @enderror">
            @foreach ($lokasi as $item)
                <option value="{{ $item->id }}" {{ isset($pengunjung) && $pengunjung->nama==$item->nama?"selected":"" }}>{{ $item->nama }}</option>
            @endforeach
            </select>
            @error('lokasi_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pengunjung">Jumlah Pengunjung</label>
            <input type="number" class="form-control @error("pengunjung") is-invalid @enderror" name="pengunjung"
                value="{{ isset($pengunjung)?$pengunjung->pengunjung:old("pengunjung") }}">
            @error('pengunjung')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection