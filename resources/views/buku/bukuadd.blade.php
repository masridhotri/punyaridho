<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>export data buku</title>
</head>
<body>
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
                </tr @endforeach
        </tbody>
    </table>
</body>
</html>