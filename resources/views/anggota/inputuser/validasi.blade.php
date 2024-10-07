@extends('anggota.index')
@section('title', 'Validasi Anggota')
@section('content')

<div class="container-fluid">
    <h4>Unggah Foto Validasi</h4><br>

    @if ($buktiPembayaran && $buktiPembayaran->bukti_transaksi)
        <div class="form-group">
            <label>Bukti Transaksi:</label>
            <img src="{{ asset('storage/' . $buktiPembayaran->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid mt-2" style="max-width: 300px; height: auto;">
        </div>
    @else
        <p>Belum ada bukti transaksi yang diunggah.</p>
    @endif
    <br>

    <form action="{{ route('validasi.uploadFoto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_buktipembayaran" value="{{ $buktiPembayaran->id_buktipembayaran }}">
        <div class="form-group">
            <label for="bukti_validasi">Kirim Foto Validasi:</label>
            <img id="bukti_validasi_preview" src="" alt="Preview" style="display:none; max-width: 40%; margin-top: 10px;">
            <input type="file" name="bukti_validasi" id="bukti_validasi" class="form-control" style="width: 400px; margin-top: 10px;" required>
            <p class="mt-2" style="color: red">Upload Bukti Transaksi yang Anda Terima</p>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 200px;">Unggah Foto</button>
    </form>
</div>

<script>
    document.getElementById('bukti_validasi').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('bukti_validasi_preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>

@endsection
