@extends('layout.main')
@section('content')
    <div class="table-responsive "style="height: 500px; width: 100%; border: 0.5px solid black ">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>judul buku</th>
                    <th>penerbit</th>
                    <th>tahun terbit</th>
                    <th>kategori</th>
                    <th>bahasa</th>
                    <th>harga</th>
                    <th>foto</th>
                    <th>stock</th>
                    <th>
                        <div class="col12"><button class="btn btn-danger btn-sm text-light"><a
                                    href="{{ route('admin.index.user') }}">tambah</a></button></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku_data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->judul }}</td>
                        <td>{{ $d->penerbit }}</td>
                        <td>{{ $d->tahun }}</td>
                        <td>{{ $d->kategori }}</td>
                        <td>{{ $d->bahasa }}</td>
                        <td>{{ $d->harga }}</td>
                        <td>{{ $d->foto }}</td>
                        <td>{{ $d->stock }}</td>
                        
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
