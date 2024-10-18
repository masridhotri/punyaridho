@extends('layout.main')
@section('content')
    <main>
        <div class="table-responsive "style="height: 500px; width: 100%; border: 0.5px solid black ">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>judul</th>
                        <th>user</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $buk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $buk->buku->judul }}</td>
                            <td>{{ $buk->transaksi->user->name}}</td>
                            <td>
                                <div class="d-flex align-item-center">
                                    <button class="btn btn-primary w-3" data-bs-target="#modalupdate{{ $buk->id }}"
                                        data-bs-toggle="modal"><i class="bi bi-pencil-square"></i> edit</button>
                                    <form action="" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-light"><i class="bi bi-trash"></i>
                                            hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <button class="btn btn-primary w-1" style="width: 40rem;"><a href="{{ route('admin.detail.expor') }}">export</a></button>

@endsection
