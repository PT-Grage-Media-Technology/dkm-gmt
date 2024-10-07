<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

@extends('layouts.master')
@include('includes.nav')

<br>
<br>
<!-- Close Header -->
<section class="bg-light w-100">
    <div class="container">
        <div class="row d-flex align-items-center py-5">
            <div class="col-lg-6 text-start">
                <h1 class="h2 py-5 text-primary typo-space-line" style="font-size: 2rem;">About Us</h1>
                <p class="light" style="font-size: 1rem; color: black;">
                    DKM merupakan Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                </p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('landing/assets/img/animasi_kurban 1.png') }}" alt="Animasi Kurban">
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
    <!-- End Banner Hero -->
         <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
