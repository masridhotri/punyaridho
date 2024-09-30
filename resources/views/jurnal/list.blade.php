@extends('layout.main')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="table-responsive "style="height: 500px; width: 100%; border: 0.5px solid black ">
            <table  id="example" class="table table-striped nowrap" style="width:100%" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>judul</th>
                        <th>penerbit</th>
                        <th>tahun terbit</th>
                        <th>kategori</th>
                        <th>bahasa</th>
                        <th>harga</th>
                        <th>foto</th>
                        <th>stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku_data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->role }}</td>
                            <td>
                              <a href="{{ route('admin.index.user', $d->id) }}" claas="btn btn-primary btn-sm">
                                <form action="{{route('admin.user.delete', $d->id)}}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm" >hapus</button>
                                </form>
                              </a>
                            </td>
                            <td>
                              <a href="{{ route('admin.user.edit', $d->id) }}" claas="btn btn-primary btn-sm">
                                
                                  <button type="submit" class="btn btn-secondary btn-sm" >edit</button>
                                
                              </a>
                            </td>
                        </tr
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                    <form class="forms-sample" action="{{route('admin.submit')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">judul</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputName1" placeholder="Name">
                        @error('judul')
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
                        <input type="date" name="tahunterbit" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        @error('tahunterbit ')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectrole">role</label>
                        <select class="form-control" name="role" id="exampleSelectrole">
                          <option value="Admin">Admin</option>
                          <option value="User" >User</option>
                        </select>
                        @error('role')
                          <small>{{$message}}</small>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button></button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
 
  <button class="btn btn-primary w-3" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Create data</button>
@endsection