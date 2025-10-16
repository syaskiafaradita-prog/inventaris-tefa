<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inventaris TEFA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Inventaris TEFA</a>
    <div class="navbar-nav">
      <a class="nav-link" href="{{ route('barangs.index') }}">Barang</a>
      <a class="nav-link" href="{{ route('barang_masuks.index') }}">Barang Masuk</a>
      <a class="nav-link" href="{{ route('barang_keluars.index') }}">Barang Keluar</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  @yield('content')
</div>

</body>
</html>
