<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog Saya</title>
  </head>
  <body>
    <h1>Daftar Artikel</h1>
    <?php foreach ($posts as $post): ?>
      <h2><?php echo $post->judul; ?></h2>
      <a href="<?php echo base_url('blog/update/' . $post->id); ?>">Update</a>
      <a href="<?php echo base_url('blog/delete/' . $post->id); ?>">Hapus</a>
      <p><?php echo $post->konten; ?></p>
    <?php endforeach; ?>
  </body>
</html>
