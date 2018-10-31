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
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/puisi'); ?>">Puisi<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/register'); ?>">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Daftar</button>
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
      <h1>Puisi</h1>
      <br>
      <h3>Daftar puisi</h3>
      <br>
      <div class="row">
    <?php foreach ($puisi as $post): ?>
    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo base_url('users_img/') . $post->gambar; ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php echo $post->judul; ?></h5>
        <p class="card-text">Oleh : <?php echo $post->penulis; ?></p>
        <a href="<?php echo base_url('index.php/postingan/baca/') . $post->id_postingan; ?>" class="btn btn-primary">Baca</a>
      </div>
      </div>
    <?php endforeach; ?>
    </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </main>
  </body>
</html>