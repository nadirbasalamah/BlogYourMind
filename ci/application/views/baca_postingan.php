<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
$nama = ($this->session->userdata['logged_in']['nama']);
} else {
header("location: " . base_url('index.php/Pengguna/'));
}
?>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/starter-template.css" rel="stylesheet">
  <link href="starter-template.css" rel="stylesheet">
    <title>BlogYourMind</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="<?php echo base_url('index.php/Pengguna/explore'); ?>">BlogYourMind</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/exploreCerpen'); ?>">Cerpen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/exploreNovel'); ?>">Novel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/explorePuisi'); ?>">Puisi</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama;?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="<?php echo base_url('index.php/Pengguna/dasbor'); ?>">Lihat dasbor</a>
              <a class="dropdown-item" href="<?php echo base_url('index.php/Pengguna/logout'); ?>">Log out</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('index.php/Pengguna/pencarianKarya'); ?>" method="post">
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Cari" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
          </form>
      </div>
    </nav>
    <main role="main" class="container">
      <div class="starter-template">
      <?php foreach ($postingan as $post): ?>
      <a class="btn btn-primary" href="<?php echo base_url('index.php/Pengguna/tambahFavorit/') . $post->id_postingan;?> " role="button">Tambahkan ke favorit</a>
      <h1><?php echo $post->judul; ?></h1>
      <img class="rounded mx-auto d-block" src="<?php echo base_url('users_img/') . $post->gambar; ?>" alt="Cover image">
      <br>
      <h5>Oleh : <a href="<?php echo base_url('index.php/Pengguna/lihatProfil/') . $post->id_penulis;?> "><?php echo $post->penulis; ?></a></h5>
      <h6>Kategori : <?php echo $post->kategori?></h6>
      <br>
      <p><?php echo $post->konten; ?></p>
      <br>
      <p><?php echo $post->suka;?> pengguna menyukai karya ini</p>
      <a class="btn btn-success" href="<?php echo base_url('index.php/Pengguna/suka/') . $post->id_postingan;?> " role="button">Suka</a>
      <h6>Komentar</h6>
      <?php foreach ($komentar as $kmn):?>
      <p style="font-weight:bold;"><?php echo $kmn->nama;?></p>
      <p><?php echo $kmn->isi;?></p>
      <?php endforeach;?>
      <?php endforeach; ?>
      <br>
      <?php foreach ($postingan as $post):?>
      <form action="<?php echo base_url('index.php/Pengguna/komentar/') . $post->id_postingan;?>" method="post">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Masukkan komentar Anda</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="komentar"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Unggah</button>
      </form>
      </div>
      <?php endforeach;?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </main>
  </body>
</html>