<!-- resources/views/layouts/contact.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

@extends('layouts.master')
@include('includes.nav')

<section class="bg-light">
        <div class="container py-4">
            <div class="row align-items-center justify-content-between">
                <div class="contact-header col-lg-4">
                    <h1 class="h2 pb-3 text-primary">Contact</h1>
                    <h3 class="h4 regular-400">Anda dapat menghubungi kami melalui platform berikut</h3>
                    <p class="light-300">
                    <ul class="list-unstyled contact-list">
                    <li class="contact-item mb-3">
                    <ul class="list-unstyled">
            <li><a href="https://wa.me/08957534600" target="_blank"><i class="bi bi-whatsapp"></i>WhatsApp</a></li><br>
            <li><a href="mailto:info@yourdomain.com"><i class="bi bi-envelope-at-fill"></i> email@gmail.com</a></li><br>
            <li><i class="bi bi-geo-alt-fill"></i> Jalan Contoh No. 123, Kota, Negara</li><br>
        </ul>
                    </p>
                </div>
                <div class="contact-img col-lg-5 align-items-end col-md-4">
                    <img src="{{ asset('landing/assets/img/masjiddd.png')}}">
                </div>
            </div>
        </div>

    </section>
    @include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>