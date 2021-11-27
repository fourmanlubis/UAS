@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>Jumlah Pengunjung</h1>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("pengunjung.create") }}" class="btn btn-success">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>lokasi</th>
                <th>jumlah</th>
                <th colspan=2 width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pengunjung as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kodepos }}</td>
            <td>{{ $item->wisata->nama }}</td>
            <td>{{ $item->lokasi->nama }}</td>
            <td>{{ $item->pengunjung }}</td>
            <td><a href="{{ route("pengunjung.edit",$item) }}" class="btn btn-warning btn-block">Rubah</a></td>
            <td><a href="#" class="btn btn-danger"
                onclick="event.preventDefault();
                document.getElementById('hapus-pengunjung-{{ $item->id }}').submit();">Hapus</a>
                <form id="hapus-pengunjung-{{ $item->id }}" action="{{ route("pengunjung.destroy",$item) }}" method="post">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
</div>
@endsection