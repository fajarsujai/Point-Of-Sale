<!-- Image and text -->

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="{{route('sistemPenjualan.index')}}">
    <img src="http://www.mavenlogix.org/wp-content/uploads/2019/01/laravel-512-400x400.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Sistem Pergudangan
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{route('sistemPenjualan.index')}}">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Kategori</a>
      <a class="nav-item nav-link" href="#">Pelanggan</a>
      <a class="nav-item nav-link" href="{{route('produk.index')}}">Produk</a>
      <a class="nav-item nav-link" href="{{route('produkKeluar.index')}}">Produk Keluar</a>
      <a class="nav-item nav-link" href="#">Produk Masuk</a>
      <a class="nav-item nav-link" href="#">Supplier</a>
    </div>
  </div>
</nav>
