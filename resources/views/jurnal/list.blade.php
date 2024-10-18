@extends('layout.main')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="table-responsive "style="height: 500px; width: 100%; border: 0.5px solid black ">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>judul</th>
                            <th>akreditas</th>
                            <th>kategori</th>
                            <th>bentuk</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurnal as $jur)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jur->judul }}</td>
                                <td>{{ $jur->akreditas }}</td>
                                <td>{{ $jur->kategori->nama }}</td>
                                <td>
                                    <div class="showfile">
                                        <img src="{{ asset('upfile/' . $jur->file) }}"
                                            style="width:4 rem; height:3rem;"></img>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-item-center gap-1">
                                        <button class="btn btn-primary w-3"
                                            data-bs-target="#modalupdatejur{{ $jur->id }}" data-bs-toggle="modal"><i
                                                class="bi bi-pencil-square"></i> edit</button>
                                        <form action="{{ route('admin.jurnal.delete', $jur->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-light"><i
                                                    class="bi bi-trash"></i> hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <button class="btn btn-primary w-3" data-bs-target="#modalcreate" data-bs-toggle="modal">Create data</button>

    {{-- modal create --}}
    <div class="modal fade" id="modalcreate" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">create new data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.jurnal.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">judul</label>
                                        <input type="text" name="judul" class="form-control" id="exampleInputName1"
                                            placeholder="Name">
                                        @error('judul')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">akreditas</label>
                                            <input type="number" name="akreditas" class="form-control"
                                                id="exampleInputPassword4" placeholder="Password">
                                            @error('akreditas')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectrole">kategori</label>
                                            <select class="form-control" name="kategori_id" id="exampleSelectrole">
                                                @foreach ($kategori as $kate)
                                                    <option value="{{ $kate->id }}"
                                                        {{ $kate->id == old('kategori_id') ? 'selected' : '' }}>
                                                        {{ $kate->nama }} <!-- Sesuaikan dengan nama kolom -->
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">file</label>
                                            <input type="file" name="file" required>
                                            @error('file')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- update data --}}
    @foreach ($jurnal as $ujur)
        <div class="modal fade" id="modalupdatejur{{ $ujur->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">update data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.jurnal.update', $ujur->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">judul</label>
                                            <input type="text" value="{{ $ujur->judul }}" name="judul" value=""
                                                class="form-control" id="exampleInputName1" placeholder="Name">
                                            @error('judul')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">akreditas</label>
                                            <input type="number" value="{{ $ujur->akreditas }}" name="akreditas"
                                                class="form-control" id="exampleInputPassword4" placeholder="Password">
                                            @error('tahunterbit ')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectrole">kategori</label>
                                            <select class="form-control" name="kategori_id" id="exampleSelectrole">
                                                @foreach ($kategori as $cate)
                                                    <option value="{{ $cate->id }}"
                                                        {{ $cate->id == $ujur->kategori_id ? 'selected' : '' }}>
                                                        {{ $cate->nama }} <!-- Sesuaikan dengan nama kolom -->
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">file</label>
                                            <input type="file" value="{{ $ujur->file }}" name="file" required>
                                            @error('file')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row justify-content-center gap-2">
        @foreach ($jurnal as $dw)
            <div class="col-md-5 border">
                <div class="card mb-3" style="max-width: 25rem;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dw->judul }}</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                    to additional content. This content is a little bit longer.</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                    <a href="{{ route('admin.jurnal.show',$dw->id) }}">{{ $dw->judul }}</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
