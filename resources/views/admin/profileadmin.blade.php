@extends('admin.layouts.main')

@section('title', 'Profile')

@section('content')

{{-- <head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .img-profile {
            width: 150px;
            height: 150px;
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head> --}}


        <div class="container-fluid">
            <div class="profile-container">
                {{-- <h1 class="h3 mb-4 text-gray-800">Profile</h1> --}}
                <div class="img-container">
                    <!--<img class="img-profile" src="{{ asset('storage/' . $setting->logo) }}" alt="Logo DKM">-->
                    @if(isset($setting) && $setting->logo)
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo DKM" class="img-profile">
                    @else
                    <img id="current-profile-image" src="{{ asset('image/profil.png') }}" alt="Default Logo" class="profile-picture" style="max-width: 150px; height: auto;">
                    @endif
                </div>
            </div>
            <form action="{{ route('setting.update', ['id' => $setting->id_admin]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Admin</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $setting->nama_lengkap }}" required disabled>
                </div>
             
                    <a class="btn btn-primary  text-white" href="{{ route('settingedit') }}"></i>Edit</a>
              
            </form> 
        </div>

   
@endsection

