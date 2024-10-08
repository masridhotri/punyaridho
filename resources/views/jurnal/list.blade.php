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
                      <th>penulis</th>
                      <th>penerbit</th>
                      <th>tahun terbit</th>
                      <th>akreditas</th>
                      <th>kategori</th>
                      <th>bahasa</th>
                      <th>file</th>
                      <th>aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($jurnal as $jur)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $jur->judul }}</td>
                          <td>{{ $jur->penulis }}</td>
                          <td>{{ $jur->penerbit }}</td>
                          <td>{{ $jur->tahun }}</td>
                          <td>{{ $jur->akreditas}}</td>
                          <td>{{ $jur->kategori->nama }}</td>
                          <td>{{ $jur->bahasa }}</td>
                          <td>
                              <div class="showfile">
                                 <a href="{{ asset('upfile/' . $jur->file) }}"  style="width: 50px">lihat</a>
                              </div>
                          </td>
                          <td>
                              <div class="d-flex align-item-center gap-1">
                              <button class="btn btn-primary w-3" data-bs-target="#modalupdate{{ $jur->id }}"
                                  data-bs-toggle="modal"><i class="bi bi-pencil-square"></i>  edit</button>
                              <form action="{{ route('admin.jurnal.delete', $jur->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-danger text-light"><i class="bi bi-trash"></i>  hapus</button>
                              </form>
                              </div>
                          </td>
                      </tr 
                      
                    @endforeach
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
                          <form action="{{route('admin.jurnal.store')}}" method="post" enctype="multipart/form-data">
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
                                      <input type="date" name="tahun" class="form-control"
                                          id="exampleInputPassword4" placeholder="Password">
                                      @error('tahunterbit ')
                                          <small>{{ $message }}</small>
                                      @enderror
                                  </div>
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
                                      <label for="exampleInputPassword4">bahasa</label>
                                      <input type="text" name="bahasa" class="form-control"
                                          id="exampleInputPassword4" placeholder="Password">
                                      @error('bahasa')
                                          <small>{{ $message }}</small>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword4">file</label>
                                      <input type="file" name="file"  required>
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

{{-- update data --}}
@foreach ($jurnal as $ujur)
<div class="modal fade" id="modalupdate{{ $ujur->id }}" aria-hidden="true"
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
                                    <input type="text" value="{{ $ujur->judul }}" name="judul"
                                        value="" class="form-control" id="exampleInputName1"
                                        placeholder="Name">
                                    @error('judul')
                                        <small>{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputName1">penulis</label>
                                        <input type="text" value="{{ $ujur->penulis }}" name="penulis"
                                            class="form-control" id="exampleInputName1" placeholder="Name">
                                        @error('penulis')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">penerbit</label>
                                        <input type="text" value="{{ $ujur->penerbit }}" name="penerbit"
                                            class="form-control" id="exampleInputEmail3" placeholder="Email">
                                        @error('penerbit')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">tahun terbit</label>
                                        <input type="date" value="{{ $ujur->tahun }}" name="tahun"
                                            class="form-control" id="exampleInputPassword4"
                                            placeholder="Password">
                                        @error('tahunterbit ')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">akreditas</label>
                                        <input type="number" value="{{ $ujur->akreditas }}" name="akreditas"
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
                                        <label for="exampleInputPassword4">bahasa</label>
                                        <input type="text" value="{{ $ujur->bahasa }}" name="bahasa"
                                            class="form-control" id="exampleInputPassword4"
                                            placeholder="Password">
                                        @error('bahasa')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">file</label>
                                        <input type="file" value="{{ $ujur->foto }}" name="file"
                                             required>
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
</div>
</div>
@endforeach
@endsection