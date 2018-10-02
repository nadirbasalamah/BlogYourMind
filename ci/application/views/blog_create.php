<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog Saya</title>
  </head>
  <body>
    <h1>Tulis Artikel Baru</h1>
    <form action="<?php echo base_url('blog/create_process'); ?>" method="post">
      <label>
        Judul: <input type="text" name="judul" autofocus>
      </label>
      <br>
      <label>
        Konten:<br>
        <textarea name="konten"></textarea>
      </label>
      <br>
      <input type="submit" value="Simpan">
    </form>
  </body>
</html>
