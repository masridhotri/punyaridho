@extends('layout.main')
@section('content')
    <div class="row justify-content-center gap-2">
        @foreach ($buku as $wd)
            <div class="col-md-5 border">
                <div class="card mb-3" style="max-width: 25rem;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/' . $wd->foto) }}" class="img-fluid rounded-start" alt="..."
                                style="width:11rem; height:11rem; object-fit:cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $wd->judul }}</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                    to additional content. This content is a little bit longer.</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalinfo{{ $wd->id }}">
                                    Info
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @foreach ($buku as $info)
        <!-- Modal -->
        <div class="modal fade mb-5" id="modalinfo{{ $info->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="exampleModalToggleLabel">Modal {{ $info->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-0 gap-2">
                            <div class="col-md-5">
                                <img src="{{ asset('uploads/' . $info->foto) }}" class="img-fluid rounded-start"
                                    alt="..." style="width:11rem; height:11rem; object-fit:cover;">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $info->judul }}</h3>
                                    <br>
                                    <br>
                                    <p>Penerbit: {{ $info->penerbit }}</p>
                                    <p>Kategori: {{ $info->kategori->nama }}</p>
                                    <p>Bahasa: {{ $info->bahasa }}</p>
                                    <p>Harga: Rp. {{ $info->harga }}</p>
                                    <input type="number" value="1" min="1" id="qty{{ $info->id }}"
                                        style="width: 60px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p>Stock saat ini: {{ $info->stok }}</p>
                        <button class="btn border border-success"
                            onclick="addToCart('{{ $info->judul }}', {{ $info->harga }}, '{{ $info->id }}')">
                            <i class="bi bi-bag-check"></i> Beli
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="container " style="margin-bottom: 10rem; margin-top:5rem; ">
        <table id="belanja" class="table table-bordered ">
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="cartItems">
                <!-- Item keranjang akan ditambahkan di sini -->
            </tbody>
        </table>
    </div>



    <div class="d-flex mt-5 justify-content-center">
        <div class="mt-5 mt-lg-0" id="bayarbelanja">
            <div class="card border shadow-none">
                <div class="card-header bg-dark text-light border-bottom py-3 px-4">
                    @php
                        $no = 1;
                    @endphp
                    <h5 class="font-size-16 mb-0">Order Summary
                        <span class="float-end">{{ $no++ }}</span>
                    </h5>
                </div>
                <div class="card-body p-4 pt-2">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                               
                                    <tr class="bg-light">
                                        <th>totalharga :</th>
                                        <input type="hidden" name="total_harga" value="0">
                                        <td class="text-end">
                                            <span class="fw-bold grand-total" id="grandtotalTx">Rp. </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>pembayaran :
                                            <input name="uang_masuk" type="text" class="form-control" id="uangMasuk"
                                                placeholder="pembayaran" oninput="hitungKembalian()">
                                        </td>
                                        <td>kembalian :
                                            <input name="uang_kembalian" type="text" class="form-control" id="kembali"
                                                placeholder="kembalian" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="d-grid">
                                            <button class="btn btn-dark" onclick="checkout()">Button</button>
                                        </td>
                                    </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
     var totalAll = 0;
var cartItems = [];

function addToCart(nama, harga, id) {
    // Ambil qty dari input
    var qty = parseInt(document.getElementById('qty' + id).value);
    if (isNaN(qty) || qty <= 0) {
        alert("Silakan masukkan jumlah yang valid.");
        return;
    }

    // Hitung total harga
    var total = harga * qty;
    totalAll = totalAll + total;

    // Tambahkan item ke dalam array cartItems
    cartItems.push({
        id: id,
        nama: nama,
        qty: qty,
        harga: harga,
        total: total
    });

    // Buat row baru untuk tabel belanja
    var tableRow = `
    <tr>
        <td>${nama}</td>
        <td>${qty}</td>
        <td>Rp. ${harga.toLocaleString()}</td>
        <td>Rp. ${total.toLocaleString()}</td>
    </tr>
    `;

    // Tambahkan row ke tabel
    document.getElementById('cartItems').insertAdjacentHTML('beforeend', tableRow);

    // Update total di tampilan
    document.getElementById('grandtotalTx').textContent = 'Rp. ' + totalAll.toLocaleString();

    // Menampilkan pesan sukses
    alert(nama + " telah ditambahkan ke keranjang.");
}

function hitungKembalian() {
    var totalharga = totalAll;
    var uangMasuk = parseInt(document.getElementById('uangMasuk').value) || 0;

    var uangKembalian = uangMasuk - totalharga;

    if (uangKembalian < 0) {
        document.getElementById('kembali').value = 'Uang tidak cukup';
    } else {
        document.getElementById('kembali').value = 'Rp ' + uangKembalian.toLocaleString();
    }
}

function checkout() {
    const uangMasuk = parseInt(document.getElementById('uangMasuk').value) || 0;
    const uangkembalian = parseInt(document.getElementById('kembali').value.replace('Rp. ', '').replace(/,/g, '')) || 0;
    const grandTotal = totalAll;

    // console.log(uangMasuk, uangkembalian, grandTotal);
    
    fetch('/admin/transaksi/store', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
        },
        body: JSON.stringify({
            items: cartItems, // Mengirim data barang di keranjang
            bayar: uangMasuk,  // Uang masuk dari user
            kembalian: uangkembalian,  // Kembalian
            total: grandTotal  // Total harga
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // window.location.href = '/admin/transaksi'; // Jika berhasil, arahkan ke halaman transaksi
            location.reload();
        } else {
            alert('Terjadi kesalahan: ' + data.message);
        }
    })
    .catch(error => {
        alert('Terjadi kesalahan saat checkout. Silakan coba lagi.');
    });
}

    </script>
@endsection
