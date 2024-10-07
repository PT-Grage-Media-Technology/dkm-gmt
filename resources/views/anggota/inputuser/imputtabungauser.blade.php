@extends('anggota.index')
@section('title', 'Input Tabungan User')
@section('content')

<div class="container-fluid">
    <h2>Data Input Tabungan</h2>
    <div class="col-md-10">
        <div class="bg-light-green p-4 rounded">
            @if(isset($peringatan))
                <div class="alert alert-warning">
                    {{ $peringatan }}
                </div>
            @else
                <form action="{{ route('storetabungan', ['user' => $user->id, 'tabunganKurId' => $tabunganKurs->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pengguna">Nama Penabung</label>
                        <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" value="{{ $user->nama_lengkap }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tabungan_kur_id">Tabungan</label>
                        <input type="hidden" id="tabungan_kur_id" name="tabungan_kur_id" value="{{ $tabunganKurs->id }}" />
                        <input type="text" class="form-control" value="{{ $tabunganKurs->produk->name }} - Rp{{ number_format((float) $tabunganKurs->produk->price, 2) }}" readonly />
                    </div>

                    <div class="form-group">
                        <label for="sisa_pembayaran">Sisa Pembayaran Semuanya</label>
                        <input type="hidden" id="sisa_pembayaran" name="sisa_pembayaran" value="{{ $tabunganKurs->id }}" />
                        <input type="text" class="form-control" value="Rp{{ number_format($tabunganKurs->sisaPembayaran(), 2) }}" readonly />
                    </div>

                    <div class="form-group">
                        <label for="rincian_tanggal_bayar">Rincian Tanggal Bayar</label>
                        <input type="date" id="rincian_tanggal_bayar" name="rincian_tanggal_bayar" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="sisa_pembayaran_bulan_ini">Sisa Pembayaran Bulan Ini</label>
                        <input type="text" class="form-control" value="Rp{{ number_format($sisaPembayaranBulanIni, 2) }}" readonly />
                    </div>

                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" id="total_bayar" name="total_bayar" class="form-control" required>
                    </div>

                    <input type="hidden" id="produk_harga" value="{{ $tabunganKurs->produk->price }}">
                    <input type="hidden" id="minus_pembayaran" name="minus_pembayaran">

                    @if($tabunganKurs->metode->jenis === 'Bayar di Tempat')
                        <div class="form-group">
                            <label for="bukti_proses">Upload Bukti</label>
                            <input type="file" id="bukti_proses" name="bukti_proses" class="form-control" required>
                            <small class="text-danger">* Wajib diisi</small>
                            <img id="bukti_proses_preview" src="" alt="Preview" style="display:none; max-width: 50%; margin-top: 10px;">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="bukti_transaksi">Bukti Transaksi</label>
                            @if ($buktiPembayaran && $buktiPembayaran->bukti_transaksi)
                                <!-- Link gambar bukti transaksi -->
                                <a id="bukti_transaksi_link" href="{{ asset('storage/' . $buktiPembayaran->bukti_transaksi) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $buktiPembayaran->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid mt-2" style="width: 500px; height: auto;">
                                </a>
                                <p class="mt-2" style="color: red">Klik gambar untuk melihat lebih jelas.</p>
                                <input type="hidden" id="bukti_pembayaran_id" name="bukti_pembayaran_id" value="{{ $buktiPembayaran->id }}">
                                <input type="text" id="bukti_transaksi" name="bukti_transaksi" class="form-control mt-2" value="{{ old('bukti_transaksi', $buktiPembayaran->bukti_transaksi) }}" readonly>
                            @else
                                <input type="text" id="bukti_transaksi" name="bukti_transaksi" class="form-control" value="Belum ada bukti transaksi" readonly>
                            @endif
                        </div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('list.penabung') }}" class="btn btn-secondary">Kembali</a>
                </form>
            @endif
        </div>
    </div>
</div>

<script>
    // Update minus pembayaran ketika total bayar berubah
    document.getElementById('total_bayar').addEventListener('input', function () {
        var produkHarga = parseFloat(document.getElementById('produk_harga').value) || 0;
        var totalBayar = parseFloat(this.value) || 0;
        var minusPembayaran = produkHarga - totalBayar;
        document.getElementById('minus_pembayaran').value = minusPembayaran.toFixed(2);
    });

    // Pratinjau gambar bukti proses penyetoran
    document.getElementById('bukti_proses').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('bukti_proses_preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>

@endsection
