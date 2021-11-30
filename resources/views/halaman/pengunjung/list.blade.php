@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>PENGINAPAN</h1>
    <html lang="en">
    <head>
    </head>
    <body>
        <p>Untuk lebih lengkapnya, silahkan buka:
            <a href="https://www.google.com/search?q=alamat+lengkap+penginapan+di+objek+wisata+samosir&rlz=1C1CHBF_enID974ID974&sxsrf=AOaemvJzc9KA4geDI0HMBrWP2m-U_t_vEg%3A1638241001679&ei=6ZKlYY3rKJCb4-EPju-m6AU&oq=alamat+lengkap+penginapan+di+objek+&gs_lcp=Cgdnd3Mtd2l6EAEYADIFCCEQoAE6CggjEK4CELADECc6BAgjECc6BwgjEOoCECc6BAgAEEM6CAguELEDEIMBOgsIABCABBCxAxCDAToICAAQgAQQsQM6BQgAEIAEOgUILhCABDoLCC4QgAQQxwEQrwE6BwgjELACECc6BAgAEA06BggAEBYQHjoICAAQCBANEB46BwghEAoQoAFKBAhBGAFQ-wZYx6ABYNCuAWgKcAB4BIABowKIAYRAkgEHMC4zMy4xMZgBAKABAbABCsgBAcABAQ&sclient=gws-wiz">Alamat lengkap penginapan di objek wisata samosir</a>
        </p>
    </body>
    </html>
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
                <th>harga</th>
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