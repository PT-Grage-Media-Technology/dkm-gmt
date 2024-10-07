@extends('admin.layouts.main')
@section('title', 'Data Metode Pembayaran')
@section('content')

<div class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Data Metode Pembayaran</h2>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Method Button -->
            <a href="{{ route('metode.damet') }}" class="btn btn-primary mb-3">Tambah Metode</a>

            <!-- Method Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($metode as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->jenis }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $data->id }}">Edit</button>
                                    <form action="{{ route('metode.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Metode Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('metode.update', $data->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="jenis_metode">Jenis Metode Pembayaran:</label>
                                                    <input type="text" class="form-control" id="jenis_metode" name="jenis_metode" value="{{ $data->jenis }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($metode->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data metode pembayaran yang ditemukan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
