<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BlogYourMind</title>
  </head>
  <body>
    <h1>BlogYourMind</h1>
    <?php foreach ($posts as $post): ?>
      <h2><?php echo $post->judul; ?></h2>
      <p><?php echo $post->konten; ?></p>
      <p><?php echo $post->kategori; ?></p>
    <?php endforeach; ?>
  </body>
</html>