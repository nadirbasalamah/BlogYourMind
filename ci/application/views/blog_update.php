<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog Saya</title>
  </head>
  <body>
    <h1>Update Artikel</h1>
    <?php foreach ($posts as $post): ?>
    <form action="<?php echo base_url('blog/update_process/' . $post->id); ?>" method="post">
      <label>
        Judul: <input type="text" name="judul" autofocus value="<?php echo $post->judul;?>">
      </label>
      <br>
      <label>
        Konten:<br>
        <textarea name="konten"><?php echo $post->konten;?></textarea>
      </label>
      <?php endforeach; ?>
      <br>
      <input type="submit" value="Simpan">
    </form>
  </body>
</html>