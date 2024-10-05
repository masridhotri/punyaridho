@extends('layout.main')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="table-responsive "style="height: 500px; width: 100%; border: 0.5px solid black ">
            <table id="example" class="table table-striped nowrap" style="width:100%" >
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
                            <td>{{ $buk->kategori_id  }}</td>
                            <td>{{ $buk->bahasa }}</td>
                            <td>{{ $buk->harga }}</td>
                            <td>
                             <div class="showfoto">
                              <img src="{{ asset('uploads/'.$buk->foto) }}" class="rounded"
                              style="width: 50px">
                             </div>
                        </td>
                            <td>{{ $buk->stok}}</td>  
                          <td> 
                            <button class="btn btn-primary w-3" data-bs-target="#modaledit" data-bs-toggle="modal">edit</button>
                            <button class="btn btn-danger text-light w-3" data-bs-target="#modaledit" data-bs-toggle="modal">edit</button>
                          </td>
                        </tr
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
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
                    <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">judul</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputName1" placeholder="Name">
                        @error('judul')
                          <small>{{$message}}</small>
                        @enderror
                      <div class="form-group">
                        <label for="exampleInputName1">penulis</label>
                        <input type="text" name="penulis" class="form-control" id="exampleInputName1" placeholder="Name">
                        @error('penulis')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        @error('penerbit')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">tahun terbit</label>
                        <input type="number" name="tahun" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        @error('tahunterbit ')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectrole">kategori</label>
                        <select class="form-control" name="kategori_id" id="exampleSelectrole">
                          <option value="1">fiksi</option>
                          <option value="1">sanis</option>
                          <option value="1">ilmu agama</option>
                          <option value="1">ilmu politik</option>
                          <option value="1">ilmu terapan</option>
                          <option value="1">ilmu filsafatn</option>
                          <option value="1">pengembangan diri</option>
                          {{-- @foreach ( $kategori )
                          <option value="{{ $kategori->id }}" {{ $kategori->id == $buku->kategori_id? 'selected' : '' }}>
                            {{ $kategori->nama }} <!-- Sesuaikan dengan nama kolom -->
                        </option>
                          @endforeach --}}
                        </select>
                        @error('role')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">bahasa</label>
                        <input type="text" name="bahasa" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        @error('bahasa')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">harga</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        @error('harga')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">foto</label>
                        <input type="file" name="foto" accept="image/*" required>
                        @error('foto')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">stok</label>
                        <input type="number" name="stok" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        @error('stok')
                          <small>{{$message}}</small>
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

  <button class="btn btn-primary w-3" data-bs-target="#modalcreate" data-bs-toggle="modal">Create data</button>
@endsection