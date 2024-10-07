<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
   <meta charset="UTF-8">
   <title>Navigation Bar With Scroll Every Section</title>
 <link rel="stylesheet" href="style.css">
  <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="{{ asset('css/beranda.css') }}" rel="stylesheet" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   </head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><a href="#">DKM</a></div>

      <ul class="menu">
        <li><a href="#Home">Beranda</a></li>
        <li><a href="#About">Produk</a></li>
        <li><a href="#Category">Tentang Kami</a></li>
        <li><a href="#Contact">Kontak</a></li>
        <li><a href="#Feedback"><i class="bi bi-person-fill"></i></a></li>
      </ul>
    </div>
  </nav>
  <section id="Home">Home Section</section>
  <section id="About">About Section</section>
  <section id="Category">Category Section</section>
  <section id="Contact">Contact Section</section>
  <section id="Feedback">Feedback Section</section>
  <div class="button">
    <a href="#Home"><i class="fas fa-arrow-up"></i></a>
  </div>
</body>
</html>
