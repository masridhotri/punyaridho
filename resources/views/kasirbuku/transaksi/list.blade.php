@extends('layout.main')

@section('content')
    <div class="container">
        <h1>Keranjang Belanja</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (empty($transaksi))
            <p>Keranjang Anda kosong.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tanggal Masuk</th>
                        <th>jumlah barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $id)
                        <tr>
                            <td>{{ $id->buku->judul }}</td>
                            {{-- <td>{{ $details['penulis'] }}</td>
                    <td>{{ $details['tanggal'] }}</td>  --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <div class="row justify-content-center gap-2">
                @foreach ($transaksi as $wd)
                    <div class="col-md-5 border">
                        <div class="card mb-3" style="max-width: 25rem;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('uploads/' . $wd->buku->foto) }}" class="img-fluid rounded-start"
                                        alt="..." style="width:11rem; height:11rem; object-fit:cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $wd->buku->judul }}</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in
                                            to additional content. This content is a little bit longer.</p>
                                        <p>{{ $wd->qty }}</p>
                                        <p>harga : Rp. {{ $wd->buku->harga * $wd->qty }}</p>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#statik-{{ $wd->id }}">
                                            Launch static backdrop modal
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- Button trigger modal -->



    <!-- Modal -->
    @foreach ($transaksi as $far)
    <div class="modal fade" id="statik-{{ $far->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel-{{ $far->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel-{{ $far->id }}">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('uploads/' . $far->buku->foto) }}" class="img-fluid rounded-start" alt="..." style="width:11rem; height:11rem; object-fit:cover;">
                    <p>Total Harga:</p>
                    <span id="totalitas-{{ $far->id }}"> Rp {{ $far->total }}</span>
                    <form action="{{ route('admin.cek', $far->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="harga-buku" id="harga-buku-{{ $far->id }}" value="{{ $far->buku->harga }}">
                        <div>
                            <label for="uangmasuk-{{ $far->id }}">Uang Dibayar:</label>
                            <input type="text" step="0.01" name="uangmasuk" id="uangmasuk-{{ $far->id }}" oninput="hitungKembalian({{ $far->id }})" required>
                        </div>
                        <div>
                            <label for="kembalian-{{ $far->id }}">Kembalian:</label>
                            <input type="text" step="0.01" id="kembalian-{{ $far->id }}" name="kembalian" readonly required>
                        </div>
                        <button type="submit" class="btn btn-primary">Understood</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function hitungKembalian(id) {
        // Ambil nilai harga buku berdasarkan id transaksi
        var hargaBuku = parseInt(document.getElementById('harga-buku-' + id).value) || 0;
        
        // Ambil nilai uang masuk dari input dengan id dinamis
        var uangMasuk = parseInt(document.getElementById('uangmasuk-' + id).value) || 0;
        
        // Hitung kembalian (uang masuk dikurangi harga buku)
        var uangKembalian = uangMasuk - hargaBuku;
        
        // Tampilkan hasil kembalian atau pesan "Uang tidak cukup"
        if (uangKembalian < 0) {
            document.getElementById('kembalian-' + id).value = 'Uang tidak cukup';
        } else {
            document.getElementById('kembalian-' + id).value = 'Rp ' + uangKembalian.toLocaleString();
        }
    }
</script>

@endsection
