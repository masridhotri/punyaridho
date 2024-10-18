@extends('layout.main')
@section('content')


<table id="example" class="table table-striped nowrap" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $buk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buk->judul }}</td>
                <td>{{ $buk->penulis }}</td>
                <td>{{ $buk->penerbit }}</td>
                <td>{{ $buk->tahun }}</td>
                <td>{{ $buk->kategori->nama }}</td>
                <td>{{ $buk->bahasa }}</td>
                <td>{{ $buk->harga }}</td>
                <td>
                    <div class="showfoto">
                        <img src="{{ asset('uploads/' . $buk->foto) }}" class="rounded" style="width: 50px">
                    </div>
                </td>
                <td>{{ $buk->stok }}</td>
                <td>
                    <div class="d-flex align-item-center">
                        <button class="btn btn-primary w-3"
                            data-bs-target="#modalupdate{{ $buk->id }}" data-bs-toggle="modal"><i
                                class="bi bi-pencil-square"></i> edit</button>
                        <form action="{{ route('admin.buku.delete', $buk->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger text-light"><i
                                    class="bi bi-trash"></i> hapus</button>
                        </form>
                    </div>
                </td>
            </tr @endforeach
    </tbody>
</table>

@endsection