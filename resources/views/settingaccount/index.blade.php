@extends('user.layouts.main')
@section('title', 'Home')

@section('content')
<div class="header">
    <h2>Input Data Peserta</h2>
</div>
<div class="nav-tabs flex justify-around mt-4">
    <div class="nav-link active cursor-pointer" data-target="data-peserta">Data Peserta</div>
    <div class="nav-link cursor-pointer" data-target="alamat">Alamat</div>
    <div class="nav-link cursor-pointer" data-target="ubah-password">Ubah Password</div>
</div>
@include('settingaccount.ubah_data')
@include('settingaccount.ubah_alamat')
@include('settingaccount.ubah_password')

<div id="edit-data-popup" class="popup">
    <div class="popup-content">
        @include('settingaccount.edit_ubah_data')
    </div>
</div>
<div id="edit-alamat-popup" class="popup">
    <div class="popup-content">
        @include('settingaccount.edit_ubah_alamat')
    </div>
</div>

<style>
    .popup {
        z-index: 1000;
    }
</style>

<!-- JavaScript for Popup Handling -->
<script src="{{ asset('js/popup_ubah_data.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link');
        const contentSections = document.querySelectorAll('.content-section');
        const activeTabKey = 'activeTab';

        function activateTab(target) {
            navLinks.forEach(link => link.classList.remove('active'));
            contentSections.forEach(section => section.classList.remove('active'));

            document.querySelector(`.nav-link[data-target="${target}"]`).classList.add('active');
            document.getElementById(target).classList.add('active');
        }

        function showPopup(popupId) {
            document.getElementById(popupId).classList.add('show');
        }

        function hidePopup(popupId) {
            document.getElementById(popupId).classList.remove('show');
        }

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                localStorage.setItem(activeTabKey, target);
                activateTab(target);
            });
        });

        const activeTab = localStorage.getItem(activeTabKey) || 'data-peserta';
        activateTab(activeTab);

        // Example usage of showPopup and hidePopup
        document.querySelectorAll('.open-popup').forEach(button => {
            button.addEventListener('click', function() {
                showPopup(this.getAttribute('data-popup'));
            });
        });

        document.querySelectorAll('.popup').forEach(popup => {
            popup.addEventListener('click', function(event) {
                if (event.target === this) {
                    hidePopup(this.id);
                }
            });
        });
    });
</script>

@endsection
