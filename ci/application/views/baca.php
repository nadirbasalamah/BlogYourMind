<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/starter-template.css" rel="stylesheet">
  <link href="starter-template.css" rel="stylesheet">
    <title>BlogYourMind</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">BlogYourMind</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/cerpen'); ?>">Cerpen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/novel'); ?>">Novel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/puisi'); ?>">Puisi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/register'); ?>">
            <button class="btn btn-outline-light my-2 my-sm-0" >Daftar</button>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/login'); ?>">
            <button class="btn btn-outline-light my-2 my-sm-0" >Masuk</button>
            </a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('index.php/postingan/pencarian'); ?>" method="post">
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Cari" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
          </form>
      </div>
    </nav>
    <main role="main" class="container">
      <div class="starter-template">
      <?php foreach ($postingan as $post): ?>
      <h1><?php echo $post->judul; ?></h1>
      <img class="rounded mx-auto d-block" src="<?php echo base_url('users_img/') . $post->gambar; ?>" alt="Cover image" width="640" height="480">
      <br>
      <h5>Oleh : <?php echo $post->penulis; ?></h5>
      <h6>Kategori : <?php echo $post->kategori?></h6>
      <br>
      <p><?php echo $post->konten; ?></p>
      <?php endforeach; ?>
      <br>
      <h6>Komentar</h6>
      <?php foreach ($komentar as $kmn):?>
      <p style="font-weight:bold;"><?php echo $kmn->nama;?></p>
      <p><?php echo $kmn->isi;?></p>
      <?php endforeach;?>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </main>
  </body>
</html>