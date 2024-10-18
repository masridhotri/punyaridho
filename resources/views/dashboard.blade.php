@extends('layout.main')
@section('content')
    <div class="table-responsive "style="height: 500px; width: 100%; border: 0.5px solid black ">
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>
                        aski
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($User as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->role }}</td>
                        <td>
                            <div class="d-flex align-item-center">
                                <button class="btn btn-primary w-3" data-bs-toggle="modal"><i
                                        class="bi bi-pencil-square">edit</i></button>
                                <form action="{{ route('admin.buku.delete') }}" method="post">
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
    <button class="btn btn-primary w-3" data-bs-target="#modalcreate" data-bs-toggle="modal">Create data</button>



    <div class="modal fade" id="modalcreate" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">create new data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('admin.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1"
                                placeholder="Name">
                            @error('name')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail3"
                                placeholder="Email">
                            @error('email')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input type="password" name="password" class="form-control" id="passwordku"
                                placeholder="Password">
                            <input type="checkbox" onclick="showHide()">

                            @error('password')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectrole">role</label>
                            <select class="form-control" name="role" id="exampleSelectrole">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                            @error('role')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- @foreach ($data as $edit)
          
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      
@endforeach --}}
    <script>
        function showHide() {
            var inputan = document.getElementById("passwordku");
            if (inputan.type === "password") {
                inputan.type = "text";
            } else {
                inputan.type = "password";
            }
        }
    </script>
@endsection
