
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/signup.css" rel="stylesheet">
    <title>Registrasi akun</title>
  </head>
  <body class="text-center">
    <form class="form-signin" action="<?php echo base_url('index.php/user_authentication/new_user_registration'); ?>" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Registrasi akun</h1>
      <label for="inputEmail" class="sr-only">Nama pengguna</label>
      <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Nama pengguna" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <label for="inputSurel" class="sr-only">Alamat email</label>
      <input type="email" name="email" id="inputSurel" class="form-control" placeholder="Alamat email" required>
      <label for="inputAddress" class="sr-only">Alamat</label>
      <input type="text" name="alamat" id="inputAddress" class="form-control" placeholder="Alamat" required autofocus>
      <label for="inputPN" class="sr-only">Nomor ponsel</label>
      <input type="number" name="notelp" id="inputPN" class="form-control" placeholder="Nomor ponsel" required autofocus>
      <br/>
      <br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">Sudah mempunyai akun ? </p>
      <a href="<?php echo base_url('index.php/postingan/login'); ?>">Login</a>
      <br/>
      <br/>
      <a href="<?php echo base_url('index.php'); ?>">Kembali ke beranda</a>
    </form>
  </body>
</html>