<!doctype html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
$nama = ($this->session->userdata['logged_in']['nama']);
$gambar = ($this->session->userdata['logged_in']['gambar']);
} else {
header("location: " . base_url('index.php/Pengguna/'));
}
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman dasbor</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo base_url('index.php/Pengguna/explore'); ?>">BlogYourMind</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/logout'); ?>">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
            <img src="<?php echo base_url('users_profile/') . $gambar; ?>" class="rounded mx-auto d-block" alt="Display picture" width="50" height="50">
            </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/dasbor'); ?>">
                  <span data-feather="home"></span>
                  Dasbor <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/lihatPostingan'); ?>">
                  <span data-feather="file"></span>
                  Daftar karya
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/profil'); ?>">
                  <span data-feather="users"></span>
                  Sunting profil
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/tampilFavorit'); ?>">
                  <span data-feather="layers"></span>
                  Daftar favorit
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Daftar karya favorit</h1>
          </div>
          <h3>Cerpen</h3>
            <div class="row">
            <?php foreach ($cerpen as $post): ?>
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo base_url('users_img/') . $post->gambar; ?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><?php echo $post->judul; ?></h5>
            <p class="card-text">Oleh : <?php echo $post->penulis; ?></p>
            <a href="<?php echo base_url('index.php/Pengguna/bacaPostingan/') . $post->id_postingan; ?>" class="btn btn-primary">Baca</a>
            </div> <!--konten-->
            </div>
            <?php endforeach; ?>
            </div> <!--row-->
            <h3>Novel</h3>
            <div class="row">
            <?php foreach ($novel as $post): ?>
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo base_url('users_img/') . $post->gambar; ?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><?php echo $post->judul; ?></h5>
            <p class="card-text">Oleh : <?php echo $post->penulis; ?></p>
            <a href="<?php echo base_url('index.php/Pengguna/bacaPostingan/') . $post->id_postingan; ?>" class="btn btn-primary">Baca</a>
            </div> <!--konten-->
            </div>
            <?php endforeach; ?>
            </div> <!--row-->
            <h3>Puisi</h3>
            <div class="row">
            <?php foreach ($puisi as $post): ?>
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo base_url('users_img/') . $post->gambar; ?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><?php echo $post->judul; ?></h5>
            <p class="card-text">Oleh : <?php echo $post->penulis; ?></p>
            <a href="<?php echo base_url('index.php/Pengguna/bacaPostingan/') . $post->id_postingan; ?>" class="btn btn-primary">Baca</a>
            </div> <!--konten-->
            </div>
            <?php endforeach; ?>
            </div> <!--row-->
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="<?php echo base_url(); ?>assets/js/vendor/popper.min.js"></script>
          <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
          <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
          <script>feather.replace()</script>
        </main>
      </div>
    </div>
  </body>
</html>
