@extends('layout.main')

@section('content')
    {{-- layot statistika --}}
    <h1>hello world</h1>
    {{-- end layot --}}
    <div id="layoutSidenav_content">
        <main>
            <div class="table-responsive "style="height: 500px; width: 100%; border: 0.5px solid black ">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>judul</th>
                            <th>penulis</th>
                            <th>penerbit</th>
                            <th>tahun terbit</th>
                            <th>kategori</th>
                            <th>bahasa</th>
                            <th>harga</th>
                            <th>foto</th>
                            <th>stok</th>
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
                                    <button class="btn btn-primary w-3" data-bs-target="#modalupdate{{ $buk->id }}"
                                        data-bs-toggle="modal">edit</button>
                                    <form action="{{ route('admin.buku.delete', $buk->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    {{-- modal untuk membuat data baru  --}}
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
                                <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">judul</label>
                                        <input type="text" name="judul" class="form-control" id="exampleInputName1"
                                            placeholder="Name">
                                        @error('judul')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputName1">penulis</label>
                                            <input type="text" name="penulis" class="form-control" id="exampleInputName1"
                                                placeholder="Name">
                                            @error('penulis')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">penerbit</label>
                                            <input type="text" name="penerbit" class="form-control"
                                                id="exampleInputEmail3" placeholder="Email">
                                            @error('penerbit')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">tahun terbit</label>
                                            <input type="number" name="tahun" class="form-control"
                                                id="exampleInputPassword4" placeholder="Password">
                                            @error('tahunterbit ')
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
                                            <label for="exampleInputPassword4">bahasa</label>
                                            <input type="text" name="bahasa" class="form-control"
                                                id="exampleInputPassword4" placeholder="Password">
                                            @error('bahasa')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">harga</label>
                                            <input type="number" name="harga" class="form-control"
                                                id="exampleInputPassword4" placeholder="Password">
                                            @error('harga')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">foto</label>
                                            <input type="file" name="foto" accept="image/*" required>
                                            @error('foto')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">stok</label>
                                            <input type="number" name="stok" class="form-control"
                                                id="exampleInputPassword4" placeholder="Password">
                                            @error('stok')
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
    </div>
    {{-- modal untuk mengedit ataupun mengupdate data  --}}
    <button class="btn btn-primary w-3" data-bs-target="#modalcreate" data-bs-toggle="modal">Create data</button>

    @foreach ($buku as $ub)
        <div class="modal fade" id="modalupdate{{ $ub->id }}" aria-hidden="true"
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
                                    <form action="{{ route('admin.buku.update', $ub->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">judul</label>
                                            <input type="text" value="{{ $ub->judul }}" name="judul"
                                                value="" class="form-control" id="exampleInputName1"
                                                placeholder="Name">
                                            @error('judul')
                                                <small>{{ $message }}</small>
                                            @enderror
                                            <div class="form-group">
                                                <label for="exampleInputName1">penulis</label>
                                                <input type="text" value="{{ $ub->penulis }}" name="penulis"
                                                    class="form-control" id="exampleInputName1" placeholder="Name">
                                                @error('penulis')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">penerbit</label>
                                                <input type="text" value="{{ $ub->penerbit }}" name="penerbit"
                                                    class="form-control" id="exampleInputEmail3" placeholder="Email">
                                                @error('penerbit')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword4">tahun terbit</label>
                                                <input type="number" value="{{ $ub->tahun }}" name="tahun"
                                                    class="form-control" id="exampleInputPassword4"
                                                    placeholder="Password">
                                                @error('tahunterbit ')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectrole">kategori</label>
                                                <select class="form-control" name="kategori_id" id="exampleSelectrole">
                                                    @foreach ($kategori as $cate)
                                                        <option value="{{ $cate->id }}"
                                                            {{ $cate->id == $ub->kategori_id ? 'selected' : '' }}>
                                                            {{ $cate->nama }} <!-- Sesuaikan dengan nama kolom -->
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword4">bahasa</label>
                                                <input type="text" value="{{ $ub->bahasa }}" name="bahasa"
                                                    class="form-control" id="exampleInputPassword4"
                                                    placeholder="Password">
                                                @error('bahasa')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword4">harga</label>
                                                <input type="number" value="{{ $ub->harga }}" name="harga"
                                                    class="form-control" id="exampleInputPassword4"
                                                    placeholder="Password">
                                                @error('harga')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword4">foto</label>
                                                <input type="file" value="{{ $ub->foto }}" name="foto"
                                                    accept="image/*" required>
                                                @error('foto')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword4">stok</label>
                                                <input type="number" value="{{ $ub->stok }}" name="stok"
                                                    class="form-control" id="exampleInputPassword4"
                                                    placeholder="Password">
                                                @error('stok')
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
        </div>
        </div>
    @endforeach
    {{-- user layout --}}
    <div class="row justify-content-center">
        @foreach ($buku as $wd)
            <div class="col-md-3">
                <div class="card border shadow-sm p-1 mb- bg-body-tertiary rounded" style="height: 25em; width=1 5em;">
                    <div class="ftose" style="width: 30rem">
                        <img src="{{ asset('uploads/' . $wd->foto) }}" class="card-img-top" alt="..."
                            style=" width:200px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $wd->judul }}</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a 4 bit longer.</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Launch static backdrop modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
