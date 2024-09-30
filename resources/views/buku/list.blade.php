@extends('layout.main')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Buku</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Buku</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Buku
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Stok</th>
                                <th>Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku_data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->publisher }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('buku.delete', $item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>          
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<div class="modalfade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    @csrf
                    <div class="formg-group">
                        <label>judul</label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="formg-group">
                        <label>pengarang</label>
                        <input type="text" class="form-control" name="pengarang">
                    </div>
                    <div class="formg-group">
                        <label>penerbit</label>
                        <input type="text" class="form-control" name="penerbit">
                    </div>
                    <div class="formg-group">
                        <label>stok</label>
                        <input type="text" class="form-control" name="stok">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection