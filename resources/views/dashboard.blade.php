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
                        <div class="col12"><button class="btn btn-danger btn-sm text-light"><a
                                    href="{{ route('admin.index.user') }}">tambah</a></button></div>
                    </th>
                    <th>
                        aski
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
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
@endsection
