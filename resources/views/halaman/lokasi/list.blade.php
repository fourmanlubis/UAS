@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>lokasi objek wisata</h1>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("lokasi.create") }}" class="btn btn-success">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th>Nama</th>
                <th colspan=2 width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($lokasi as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td><a href="{{ route("lokasi.edit",$item) }}" class="btn btn-warning btn-block">Rubah</a></td>
            <td><a class="btn btn-danger btn-block"
                onclick="event.preventDefault();document.getElementById('hapus-lokasi-{{$item->id}}').submit();">Hapus</a>
                <form id="hapus-lokasi-{{$item->id}}" action="{{ route("lokasi.destroy",$item) }}" method="post">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection