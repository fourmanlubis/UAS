@extends('layouts.app')
{{-- @extends('layouts/app.blade.php') --}}

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>lokasi Objek wisata</h1>'
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("wisata.create") }}" class="btn btn-success">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
               
                <th>KODE.POS</th>
                <th>Nama</th>
                <th>Alamat</th>
                
                <th colspan=2 class="w-25">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($wisata as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kodepos }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
           
            <td><a href="{{ route("wisata.edit",$item) }}"
                class="btn btn-warning btn-block">Rubah</a></td>
            <td>
                <a class="btn btn-danger btn-block"
                    onclick="event.preventDefault();
                    document.getElementById('hapus-wisata-{{$item->id}}').submit();">Hapus</a>
                <form action="{{ route("wisata.destroy",$item) }}"
                    id="hapus-wisata-{{$item->id}}" method="post">
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