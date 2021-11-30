@extends('layouts.app')
{{-- @extends('layouts/app.blade.php') --}}

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <center><h1><font color="green">Nama Wisata</font></h1></center>
    <center><h2><font color="blue">Tempat Wisata di Samosir Terbaru & Terhits Dikunjungi</font></h2></center>
    <html lang="en">
    <head>
    </head>
    <body>
        <p>Untuk lebih lengkapnya, silahkan buka:
            <a href="https://www.andalastourism.com/tempat-wisata-samosir">20 Tempat Wisata di Samosir Terbaru & Terhits Dikunjungi</a>
        </p>
                
                 <p>Untuk lebih lengkapnya, silahkan buka:
            <a href="https://www.itrip.id/tempat-wisata-samosir">22 Tempat Wisata di Samosir Terbaru & Terhits Dikunjungi</a>
        </p>
                
                 <p>Untuk lebih lengkapnya, silahkan buka:
            <a href="https://www.travelingmedan.com/2020/03/tempat-wisata-di-pulau-samosir.html">17 Tempat Wisata di Samosir Terbaru & Terhits Dikunjungi</a>
        </p>
    </body>
    </html>
   </div>
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