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
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/cerpen'); ?>">Cerpen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/novel'); ?>">Novel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/postingan/puisi'); ?>">Puisi</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Daftar</button>
        </form>
      </div>
    </nav>
    <main role="main" class="container">
      <div class="starter-template">
      <h1>Selamat datang di BlogYourMind</h1>
      <br>
      <h3>Tempat dimana Anda berekspresi dengan kata-kata</h3>
      <br>
    <h3>Baca Cerpen Terbaik</h3>
    <?php foreach ($cerpen as $post): ?>
        <h2><?php echo $post->judul; ?></h2>
        <p><?php echo $post->konten; ?></p>
        <p><?php echo $post->kategori; ?></p>
    <?php endforeach; ?>
    <br>
    <h3>Baca Novel Terbaik</h3>
    <?php foreach ($novel as $post): ?>
        <h2><?php echo $post->judul; ?></h2>
        <p><?php echo $post->konten; ?></p>
        <p><?php echo $post->kategori; ?></p>
    <?php endforeach; ?>
    <br>
    <h3>Baca Puisi Terbaik</h3>
    <?php foreach ($puisi as $post): ?>
        <h2><?php echo $post->judul; ?></h2>
        <p><?php echo $post->konten; ?></p>
        <p><?php echo $post->kategori; ?></p>
    <?php endforeach; ?>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </main>
  </body>
</html>