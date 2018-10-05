
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/signup.css" rel="stylesheet">
    <title>Login akun</title>
  </head>
  <body class="text-center">
    <form class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Login dengan menggunakan akun anda</h1>
      <label for="inputEmail" class="sr-only">Nama pengguna</label>
      <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Nama pengguna" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted">Belum mempunyai akun ? </p>
      <a href="#">Daftar disini</a>
    </form>
  </body>
</html>
