@extends('admin.layouts.main')
@section('title', 'Setting Admin')
@section('content')

        <div class="container-fluid">
            <div class="form-container">
                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-center">
                        @if(isset($setting) && $setting->logo)
                            <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo DKM" class="img-profile">
                        @endif
                        <input type="file" class="form-group text-center" id="logo" name="logo">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Admin</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{auth()->guard('lomin')->user()->username}}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        {{-- <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($alamat) ? $alamat->alamat_lengkap : '' }}" readonly> --}}
                        <a class="fas fa-pencil-alt text-black" href="{{ route('alamatubah') }}">Edit</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->

        <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>
    </div>
</body>

</html>

@endsection
